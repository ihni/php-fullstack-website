<?php
use App\Controllers\AuthController;
require __DIR__ . '/../../src/controllers/AuthController.php';
AuthController::requireRole([1]);

$pageTitle = 'Welcome!';
include '../includes/header.php';
?>

<main>
    <h1>Users</h1>
</main

<?php include '../includes/footer.php' ?>