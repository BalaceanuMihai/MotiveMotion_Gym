<?php
require_once "app/models/WorkoutPlan.php";

class WorkoutPlanController {

    private static function checkRole() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] == 3 ) {
            $_SESSION['error'] = "You do not have permission to perform this action.";
            header("Location: /MotiveMotion/auth/login");
            exit();
        }
    }

    public static function index() {
        self::checkRole(); // Check if the user has the role_id of 2 (if he is a trainer) or if he is an admin (role_id of 1)
        $workout_plans = WorkoutPlan::getAllWorkoutPlans();
        require_once "app/views/workout_plans/index.php";
    }

    public static function show($id) {
        self::checkRole(); // Check if the user has the role_id of 2 (if he is a trainer) or if he is an admin (role_id of 1)
        $workout_plan = WorkoutPlan::getByIdWorkoutPlan($id);
        require_once "app/views/workout_plans/show.php";
    }

}
?>