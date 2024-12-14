<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

/*
*
* These are for the paths
*
*/

$projectRoot = str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));
if (!defined('PROJECT_ROOT')) {
    define('PROJECT_ROOT', __DIR__ . '/../');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/php-fullstack-website/');
}

if (!defined('TEMPLATES_PATH')) {
    define('TEMPLATES_PATH', PROJECT_ROOT . 'templates/');
}

if (!defined('SRC_PATH')) {
    define('SRC_PATH', PROJECT_ROOT . 'src/');
}

if (!defined('PUBLIC_PATH')) {
    define('PUBLIC_PATH', PROJECT_ROOT . 'public/');
}

return [
    'app' => [
        'default_title' => 'Registration Website',
    ],
    'db' => [
        'host' => $_ENV['DB_HOST'] ?? 'localhost',
        'user' => $_ENV['DB_USER'] ?? 'default_db',
        'password' => $_ENV['DB_PASSWORD'] ?? 'root',
        'name' => $_ENV['DB_NAME'] ?? '',
        'charset' => 'utf8'
    ],
];