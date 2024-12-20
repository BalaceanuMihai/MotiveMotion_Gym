<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    $_SESSION['error'] = "You must be logged in to access this page.";
    header("Location: /MotiveMotion/auth/login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Workout Plans</title>
</head>
<body>
<h1>All Workout Plans</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Difficulty level</th>
    </tr>
    <?php foreach ($workout_plans as $workout_plan) : ?>
        <tr>
            <td><?= $workout_plan["name_plan"] ?></td>
            <td><?= $workout_plan["description_plan"] ?></td>
            <td><?= $workout_plan["difficulty_level"] ?></td>
        </tr>
    <?php endforeach; ?>
    
</body>
</html>