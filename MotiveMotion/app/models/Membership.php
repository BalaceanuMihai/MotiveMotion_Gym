<?php

class Membership {
    public static function getAllMemberships() {
        global $pdo;

        $sql = "SELECT * 
                FROM memberships";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMembership() {
        global $pdo;
        $membership_id = $_GET['id'];

        $sql = "SELECT * 
                FROM memberships
                WHERE membership_id = :membership_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":membership_id" => $membership_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>