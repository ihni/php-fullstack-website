<?php
// migration.php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// DB connection settings from .env file
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to MySQL server successfully.\n";

    // Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    echo "Database `$dbname` created or already exists.\n";

    // Switch to the newly created database
    $pdo->exec("USE `$dbname`");

    /*
    * This will run the SQL queries to set up table structure
    */
    $sql = file_get_contents(__DIR__ . '/../sql/schema.sql');
    $pdo->exec($sql);
    echo "Database tables set up successfully.\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
