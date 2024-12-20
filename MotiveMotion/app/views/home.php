<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Home</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="/MotiveMotion/auth/logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="/MotiveMotion/auth/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <h1>Welcome to MotiveMotion</h1>
    <?php if (isset($_SESSION['user'])): ?>
        <p>Welcome, <?= htmlspecialchars($_SESSION['user']['first_name']) ?>!</p>
    <?php else: ?>
        <p>Please <a href="/MotiveMotion/auth/login">log in</a> to access your account.</p>
    <?php endif; ?>
</body>
</html>