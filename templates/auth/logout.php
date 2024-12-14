<?php
require_once __DIR__ . '/../../src/controllers/AuthController.php';

$controller = new App\Controllers\AuthController();
$controller->logout();
