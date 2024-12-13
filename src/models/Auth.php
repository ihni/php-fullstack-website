<?php

namespace App\Models;
use App\Core\Database;

/*
*
*   Handles all Auth related operations
*   - login
*   - logout
*   - currently logged in
*
*/

class Auth {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function login($email, $password) {
        $query = "SELECT id, password, role
                  FROM users
                  WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                return $user;
            }
        }
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']) && isset($_SESSION['role']);
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
        session_destroy();
    }

}