<?php
require_once "config/pdo.php";
class Membership {
    // Read: Obtine toate aboanamentele
    public static function getAllMemberships() {
        global $pdo;

        $sql = "SELECT * 
                FROM memberships";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Read: Obtine un abonament dupa id
    public static function findById($id) {
        global $pdo;
        $sql = "SELECT * FROM memberships WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Create: Adauga un abonament
    public static function createMembership($user_id, $price, $type_memb, $starting_date, $end_date=null) {
        global $pdo;

        $sql = "INSERT INTO memberships (user_id, price, type_memb, starting_date, end_date)
                VALUES (:user_id, :price, :type_memb, :starting_date, :end_date)";
        $stmt = $pdo->prepare($sql);
        
        return $stmt->execute([
            ":user_id" => $user_id,
            ":price" => $price,
            ":type_memb" => $type_memb,
            ":starting_date" => $starting_date,
            ":end_date" => $end_date
        ]);
    }

    //Update: Modifica un abonanment existent
    public static function updateMembership($id, $user_id, $price, $type_memb, $starting_date, $end_date, $status_memb) {
        global $pdo;
        $sql = "UPDATE memberships
                SET user_id = :user_id, price = :price, type_memb = :type_memb, starting_date = :starting_date, 
                    end_date = :end_date, status_memb = :status_memb
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            ":id" => $id,
            ":user_id" => $user_id,
            ":price" => $price,
            ":type_memb" => $type_memb,
            ":starting_date" => $starting_date,
            ":end_date" => $end_date,
            ":status_memb" => $status_memb
        ]);

        return $result;
    }

    // Delete: Șterge un abonament
    public static function deleteMembership($id) {
        global $pdo;

        $sql = "DELETE FROM memberships WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([":id" => $id]);
    }
}
?>