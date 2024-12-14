<?php
namespace App\Controllers;
use App\Models\User;
use App\Core\Redirect;

require_once __DIR__ . '/../../config/config.php';

class UserController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function register() {
        $errors = [
            'fname' => '',
            'lname' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'general' => '',
        ];

        $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
        $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
        
        if (empty($fname)) {
            $errors['fname'] = 'First name is required';
        }

        if (empty($lname)) {
            $errors['lname'] = 'Last name is required';
        }

        if (empty($email)) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        } elseif ($this->user->emailExist($email)) {
            $errors['general'] = 'The email ' . $email . ' is taken';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required';
        } elseif (empty($confirmPassword)) {
            $errors['confirm_password'] = 'Confirmation  is required';
        } elseif ($password !== $confirmPassword) {
            $errors['password'] = 'Passwords do not match';
            $errors['confirm_password'] = 'Passwords do not match';
        }

        if (empty(array_filter($errors))) {
            if ($this->user->register($fname, $lname, $email, $password)) {
                Redirect::to('templates/auth/register-success.php');
            } else {
                $errors['general'] = 'Registration failed, please try again';
            }
        }
        return $errors;
    }
}