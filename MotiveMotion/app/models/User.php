<?php
require_once "config/pdo.php";

class User {
    public static function getAllUsers() {
        global $pdo;
        $sql = "SELECT * 
                FROM users";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUser($id) {
        global $pdo;
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function authenticate($email, $password) {
        global $pdo;
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists
        if ($user) {
            // Compare the plain text password directly (not recommended for security reasons)
            if ($password === $user['password_user']) {
                return $user; // Return user data if authenticated successfully
            }
        }
        
        return false; // Authentication failed
    }

    public static function findByEmail($email) {
        global $pdo;
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([":email" => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function createUser($first_name, $last_name, $email, $password_user, $role_id) {
        global $pdo;
        $hashedPassword = password_hash($password_user, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (first_name, last_name, email, password_user, role_id) VALUES (:first_name, :last_name, :email, :password_user, :role_id)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ":first_name" => $first_name,
            ":last_name" => $last_name,
            ":email" => $email,
            ":password_user" => $hashedPassword,
            ":role_id" => $role_id
        ]);
    }
}
?>