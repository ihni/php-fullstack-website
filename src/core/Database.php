<?php
namespace App\Core;
use mysqli;

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $config = include __DIR__ . '/../../config/config.php';
        $this->connection = new mysqli (
            $config['db']['host'],
            $config['db']['user'],
            $config['db']['password'],
            $config['db']['name']
        );

        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        // This prevents duplication of database connections for a single connection to the database
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}