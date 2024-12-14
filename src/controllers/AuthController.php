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

    public static function requireRole(array $allowedRoles)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], $allowedRoles)) {
            http_response_code(403);
            Redirect::to('/templates/errors/403.php');
        }
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
            if ($user['role'] === 1) {
                Redirect::to('templates/admin/dashboard.php');
            }
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