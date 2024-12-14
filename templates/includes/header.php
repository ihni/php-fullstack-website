<?php
$config = include __DIR__ . '/../../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : $config['app']['default_title']; ?></title>
</head>
<body>
    <header>
        <?php include 'navbar.php'?>
    </header>