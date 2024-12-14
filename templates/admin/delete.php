<?php
use App\Controllers\AuthController;
require __DIR__ . '/../../src/controllers/AuthController.php';
AuthController::requireRole([1]);

$pageTitle = 'Delete User';
include '../includes/header.php';
?>
