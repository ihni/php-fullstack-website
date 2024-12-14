<?php
use App\Controllers\AuthController;
require __DIR__ . '/../../src/controllers/AuthController.php';
AuthController::requireRole([1]);

$pageTitle = 'All Users';
include '../includes/header.php';
?>

<main>
    <h1>Users</h1>
    <?php echo $users ?>
</main

<?php include '../includes/footer.php' ?>