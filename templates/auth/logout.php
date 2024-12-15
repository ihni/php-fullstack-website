<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $errors = $controller->login();
    }
}

require_once __DIR__ . '/../../src/controllers/AuthController.php';

$controller = new App\Controllers\AuthController();
$controller->logout();