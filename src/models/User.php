<?php
namespace App\Models;
use App\Core\Database;

/*
*
*   Handles all CRUD related operations to user related data
*   - registration
*   - updating user attributes
*   - checking for duplicate emails
*
*/

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Create operations
    public function register($fname, $lname, $email, $password) {
        $auth = include __DIR__ . '/../../config/auth.php';

        $passwordHash = password_hash($password, $auth['hash']['algorithm']);

        $query = "INSERT INTO users (fname, lname, email, password)
                  VALUES (?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $fname, $lname, $email, $passwordHash);
        return $stmt->execute();
    }

    // Read operations
    public function emailExist($email) {
        $query = "SELECT id
                  FROM users
                  WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function getUserById($id) {
        $query = "SELECT id, fname, lname, email, created_at, role
                  FROM users
                  WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows === 1 ? $result->fetch_assoc() : null;
    }

    public function getAllUsers() {
        $query = "SELECT id, fname, lname, email, created_at, role
                  FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    // Update operations
    public function updateUserFirstName($id, $fname) {
        $query = "UPDATE users 
                  SET fname = ? 
                  WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $fname, $id);
        return $stmt->execute();
    }
    
    public function updateUserLastName($id, $lname) {
        $query = "UPDATE users 
                  SET lname = ? 
                  WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $lname, $id);
        return $stmt->execute();
    }

    public function updateUserEmail($id, $email) {
        $query = "UPDATE users 
                  SET email = ? 
                  WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $email, $id);
        return $stmt->execute();
    }

    public function updateUserPassword($id, $password) {
        $auth = include __DIR__ . '/../../config/auth.php';
        $passwordHash = password_hash($password, $auth['hash']['algorithm']);

        $query = "UPDATE users 
                  SET password = ? 
                  WHERE id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $passwordHash, $id);
        return $stmt->execute();
    }

    public function updateUserRole($id, $role) {
        $query = "UPDATE users 
                  SET role = ?
                  WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $role, $id);
        return $stmt->execute();
    }

    // Delete operations
    public function deleteUser($id) {
        $query = "DELETE FROM users
                  WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}