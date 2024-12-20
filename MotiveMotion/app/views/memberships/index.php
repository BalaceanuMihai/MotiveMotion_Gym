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
    <title>Memberships</title>
</head>
<body>
    <h1>Memberships List</h1>
    <a href="/MotiveMotion/memberships/create">Add New Membership</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Price</th>
                <th>Type</th>
                <th>Starting Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberships as $membership): ?>
                <tr>
                    <td><?= htmlspecialchars($membership['id']) ?></td>
                    <td><?= htmlspecialchars($membership['user_id']) ?></td>
                    <td><?= htmlspecialchars($membership['price']) ?></td>
                    <td><?= htmlspecialchars($membership['type_memb']) ?></td>
                    <td><?= htmlspecialchars($membership['starting_date']) ?></td>
                    <td><?= htmlspecialchars($membership['end_date'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($membership['status_memb']) ?></td>
                    <td>
                        <a href="/MotiveMotion/memberships/show/<?= $membership['id'] ?>">View</a> |
                        <a href="/MotiveMotion/memberships/edit/<?= $membership['id'] ?>">Edit</a> |
                        <form action="/MotiveMotion/memberships/destroy/<?= $membership['id'] ?>" method="post" style="display:inline;">
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>