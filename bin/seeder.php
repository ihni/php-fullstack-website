<?php
require_once __DIR__ . '/vendor/autoload.php';

// Sample seeds for project
$users = [
    ['role' => 0, 'fname' => 'John', 'lname' => 'Doe', 'email' => 'john.doe@example.com', 'password' => 'user'],
    ['role' => 1, 'fname' => 'Admin', 'lname' => 'Lastname', 'email' => 'admin@admin.com', 'password' => 'admin']
];

$config = include __DIR__ . '/../../config/config.php';

$db_host = $config['db']['host'];
$db_user = $config['db']['user'];
$db_password = $config['db']['password'];
$db_name = $config['db']['name'];

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

$stmt = $pdo->prepare("INSERT INTO users (role, fname, lname, email, password, created_at) 
                       VALUES (:role, :fname, :lname, :email, :password, NOW())");

foreach ($users as $user) {
    $auth = include __DIR__ . '/../config/auth.php';
    
    $hashedPassword = password_hash($user['password'], $auth['hash']['algorithm']);
    
    $stmt->execute([
        ':role' => $user['role'],
        ':fname' => $user['fname'],
        ':lname' => $user['lname'],
        ':email' => $user['email'],
        ':password' => $hashedPassword
    ]);
}

echo "Users seeded successfully with hashed passwords.\n";