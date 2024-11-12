<?php
require_once "app/models/WorkoutPlans.php";

class MembershipController{
    public static function index() {
        $workout_plans = Debt::getAllDebts();
        require_once "app/views/workout_plans/index.php";
    }

    public static function show() {
        $workout_plan_id = $_GET['id'];
        $workout_plan = Debt::getDebt($workout_plan_id);

        if ($workout_plan) {
            require_once "app/views/workout_plans/show.php";
        } else {
            $_SESSION['error'] = "workout_plan not found";
            require_once "app/views/404.php";
        }

    }
}
?>