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

    public static function getUser($user_id) {
        global $pdo;

        $sql = "SELECT * s
                FROM users 
                WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":user_id" => $user_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function authenticate($first_name, $last_name, $password) {
        // Example database query to get user data
        $user = getUser($user_id); // A function that fetches user data from the DB based on the username
    
        // Check if the user exists
        if ($user) {
            // Verify the password using password_verify (assuming the password is hashed)
            if (password_verify($password, $user['password'])) {
                return true; // User authenticated successfully
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