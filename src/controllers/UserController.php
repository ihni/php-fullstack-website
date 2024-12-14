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

    public function getAllUsers() {
        return $this->user->getAllUsers();
    }

    public function deleteUser($id) {
        return $this->user->deleteUser($id);
    }

    public function getUserById($id) {
        return $this->user->getUserById($id);
    }

    public function updateUser($data) {
        $errors = [
            'fname' => '',
            'lname' => '',
            'email' => '',
            'role' => '',
            'duplicate' => '',
            'general' => '',
        ];
    
        $id = isset($data['id']) ? $data['id'] : null;
        $fname = isset($data['fname']) ? $data['fname'] : '';
        $lname = isset($data['lname']) ? $data['lname'] : '';
        $email = isset($data['email']) ? $data['email'] : '';
        $role = isset($data['role']) ? (int)$data['role'] : '';
        
        $currentUser = $this->user->getUserById($id);
  
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
        }

        elseif ($this->user->emailExist($email) && $currentUser['email'] !== $email) {
            $errors['general'] = 'The email ' . $email . ' is already in use';
        }
    
        if (!empty(array_filter($errors))) {
            return $errors;
        }
        
        $changes = [];

        if ($currentUser['fname'] !== $fname) {
            $changes[] = 'First name: ' . $currentUser['fname'] . ' → ' . $fname;
        }
        if ($currentUser['lname'] !== $lname) {
            $changes[] = 'Last name: ' . $currentUser['lname'] . ' → ' . $lname;
        }
        if ($currentUser['email'] !== $email) {
            $changes[] = 'Email: ' . $currentUser['email'] . ' → ' . $email;
        }
        if ($currentUser['role'] !== $role) {
            $oldRole = $currentUser['role'] == 0 ? 'user' : 'admin';
            $newRole = $role == 0 ? 'user' : 'admin';
            
            $changes[] = 'Role: ' . $oldRole . ' → ' . $newRole;
        }

        if (empty($changes)) {
            return [
                'success' => false,
                'color' => 'grey',
                'no_changes' => true,
            ];
        }
        
        $updateSuccess = $this->user->updateUserFirstName($id, $fname) &&
                         $this->user->updateUserLastName($id, $lname) &&
                         $this->user->updateUserEmail($id, $email) &&
                         ($role !== null ? $this->user->updateUserRole($id, $role) : true);

        if ($updateSuccess) {
            return [
                'success' => true,
                'changes' => $changes,
            ];
        } else {
            $errors['general'] = 'Update failed, please try again';
        }
    }
}