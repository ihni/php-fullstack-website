<?php

return [
    'app' => [
        'default_title' => 'Registration Website',
    ],
    'db' => [
        'host' => $_ENV['DB_HOST'] ?? 'localhost',
        'user' => $_ENV['DB_USER'] ?? 'default_db',
        'password' => $_ENV['DB_PASSWORD'] ?? 'root',
        'name' => $_ENV['DB_NAME'] ?? '',
        'charset' => 'utf8'
    ],
];