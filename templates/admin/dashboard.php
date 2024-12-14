<?php

use App\Controllers\AuthController;
require __DIR__ . '/../../src/controllers/AuthController.php';
AuthController::requireRole([1]);

$pageTitle = 'Welcome!';
include '../includes/header.php';
?>

<main>
    <h1>This is the Admin Dashboard</h1>
    <p>You are currently viewing the dashboard as a logged in user</p>
</main

<?php include '../includes/footer.php' ?>