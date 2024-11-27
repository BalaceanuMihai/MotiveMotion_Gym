<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Membership Details</title>
</head>
<body>
    <h1>Membership Details</h1>
    <?php if ($membership): ?>
        <p><strong>ID:</strong> <?= htmlspecialchars($membership['id']) ?></p>
        <p><strong>User ID:</strong> <?= htmlspecialchars($membership['user_id']) ?></p>
        <p><strong>Price:</strong> <?= htmlspecialchars($membership['price']) ?></p>
        <p><strong>Type:</strong> <?= htmlspecialchars($membership['type_memb']) ?></p>
        <p><strong>Starting Date:</strong> <?= htmlspecialchars($membership['starting_date']) ?></p>
        <p><strong>End Date:</strong> <?= htmlspecialchars($membership['end_date'] ?? 'N/A') ?></p>
        <p><strong>Status:</strong> <?= htmlspecialchars($membership['status_memb']) ?></p>
        <a href="/MotiveMotion/memberships/edit/{id}=<?= $membership['id'] ?>">Edit</a>
        <a href="/MotiveMotion/memberships/index">Back to List</a>
    <?php else: ?>
        <p>Membership not found!</p>
    <?php endif; ?>
</body>
</html>
