<?php
require_once "config/pdo.php";
class UserRole {
    public static function getAllUserRoles() {
        global $pdo;
        $sql = "SELECT * 
                FROM user_roles";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUser($user_id) {
        global $pdo;
        $user_role_id = $_GET['id'];

        $sql = "SELECT * s
                FROM user_roles 
                WHERE user_role_id = :user_role_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":user_role_id" => $user_role_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>