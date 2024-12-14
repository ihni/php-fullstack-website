<?php
use App\Controllers\AuthController;
use App\Controllers\UserController;

require __DIR__ . '/../../src/controllers/UserController.php';
require __DIR__ . '/../../src/controllers/AuthController.php';

AuthController::requireRole([1]);

if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $controller = new UserController();
    $result = $controller->deleteUser($id);

    if ($result) {
        header('Location: users.php?status=success&message=User deleted successfully');
    } else {
        header('Location: users.php?status=error&message=Unable to delete user');
    }
} else {
    header('Location: users.php?status=error&message=No user ID provided');
}

exit;