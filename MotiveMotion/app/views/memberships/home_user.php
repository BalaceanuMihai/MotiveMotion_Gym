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
    <title>User Home</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['user']['first_name']) ?></h1>

    <h2>Active Memberships</h2>
    <?php if (!empty($activeMemberships)): ?>
        <ul>
            <?php foreach ($activeMemberships as $membership): ?>
                <li><?= htmlspecialchars($membership['type_memb']) ?> - <?= htmlspecialchars($membership['starting_date']) ?> to <?= htmlspecialchars($membership['end_date']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No active memberships.</p>
    <?php endif; ?>

    <h2>Expired Memberships</h2>
    <?php if (!empty($expiredMemberships)): ?>
        <ul>
            <?php foreach ($expiredMemberships as $membership): ?>
                <li><?= htmlspecialchars($membership['type_memb']) ?> - <?= htmlspecialchars($membership['starting_date']) ?> to <?= htmlspecialchars($membership['end_date']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No expired memberships.</p>
    <?php endif; ?>
</body>
</html>