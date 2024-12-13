<?php
require_once __DIR__ . '/../vendor/autoload.php';

$config = include __DIR__ . '/../config/config.php';
$db_host = $config['db']['host'];
$db_user = $config['db']['user'];
$db_password = $config['db']['password'];
$db_name = $config['db']['name'];

try {
    $pdo = new PDO("mysql:host=$db_host", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to MySQL server successfully.\n";

    // Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name`");
    echo "Database `$db_name` created or already exists.\n";

    // Switch to the newly created database
    $pdo->exec("USE `$db_name`");

    // Run the SQL queries to set up table structure
    $sql = file_get_contents(__DIR__ . '/../sql/schema.sql');
    $pdo->exec($sql);
    echo "Database tables set up successfully.\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
