<?php
require_once "config/pdo.php";
class WorkoutPlan {
    public static function getAllWorkoutPlans() {
        global $pdo;

        $sql = "SELECT * 
                FROM workout_plans";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getWorkoutPlan() {
        global $pdo;
        $workout_plan_id = $_GET['id'];

        $sql = "SELECT * 
                FROM workout_plans
                WHERE workout_plan_id = :workout_plan_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":workout_plan_id" => $workout_plan_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
