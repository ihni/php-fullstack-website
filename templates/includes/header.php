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
    <link rel="icon" href="<?php echo BASE_URL ?>public/assets/images/icons/penguin-icon.png">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/assets/css/styles.css">
    <title><?php echo isset($pageTitle) ? $pageTitle : $config['app']['default_title']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-white text-grey-800 shadow-lg">
        <div class="container mx-auto px-4">
            <?php include 'navbar.php'; ?>
        </div>
    </header>