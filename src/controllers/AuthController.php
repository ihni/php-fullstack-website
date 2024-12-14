<?php
namespace App\Controllers;
use App\Models\Auth;
use App\Core\Redirect;

require_once __DIR__ . '/../../config/config.php';

class AuthController {
    private $auth;

    public function __construct() {
        $this->auth = new Auth();
    }

    public function login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if ($this->auth->isLoggedIn()) {
            Redirect::to('templates/landing.php');
        }
    
        $errors = [
            'email' => '',
            'password' => '',
            'general' => '',
        ];
    
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
    
        if (empty($email)) {
            $errors['email'] = 'Email is required.';
        }
        if (empty($password)) {
            $errors['password'] = 'Password is required.';
        }
    
        if (!empty(array_filter($errors))) {
            return $errors;
        }
    
        $user = $this->auth->login($email, $password);
    
        if ($user) {
            Redirect::to('templates/home.php');
        } else {
            $errors['general'] = 'Email or password is incorrect';
            return $errors;
        }
    }
    
    public function logout() {
        $this->auth->logout();
        Redirect::to('templates/auth/login.php');
    }

    public function isLoggedIn() {
        return $this->auth->isLoggedIn();
    }
}