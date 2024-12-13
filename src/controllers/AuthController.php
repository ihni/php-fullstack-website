<?php

namespace App\Controllers;
use App\Models\Auth;

class AuthController {
    private $auth;

    public function __construct() {
        $this->auth = new Auth();
    }

    public function showLoginForm() {
        if ($this->auth->isLoggedIn()) {
            header("Location: /");
            exit;
        }

        include __DIR__ . '/../views/login.php';
    }

    public function login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $errors = [
            'email' => '',
            'password' => '',
        ];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty(array_filter($errors))) {
                return $errors;
            }

            $user = $this->auth->login($email, $password);

            if ($user) {
                header('Location: /');
                exit();
            } else {
                $errors['general'] = 'Email or password is wrong';
                return $errors;
            }
        }
    }

    public function logout() {
        $this->auth->logout();
        header('Location: /login');
        exit();
    }

    public function isLoggedIn() {
        return $this->auth->isLoggedIn();
    }


}