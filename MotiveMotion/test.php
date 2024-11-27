<?php
require_once 'app/models/Membership.php';
require_once 'app/models/User.php';
require_once 'app/models/WorkoutPlan.php';

$users = User::getAllUsers();
echo "<p>Users:</p>";
foreach ($users as $user) {
    echo "<pre>";
    print_r($user);
    echo "</pre>";
}

$memberships = Membership::getAllMemberships();
echo "<p>Memberships:</p>";
foreach ($memberships as $membership) {
    echo "<pre>";
    print_r($membership);
    echo "</pre>";
}

$workout_plans = WorkoutPlan::getAllWorkoutPlans();
echo "<p>Workout Plans:</p>";
foreach ($workout_plans as $workout_plan) {
    echo "<pre>";
    print_r($workout_plan);
    echo "</pre>";
}


?>