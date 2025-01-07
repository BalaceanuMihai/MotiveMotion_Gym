<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Analytics</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Membership Analytics</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Price</th>
                <th>Type</th>
                <th>Starting Date</th>
                <th>End Date</th>
                <th>Status</th>
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
                    <td><?= htmlspecialchars($membership['end_date']) ?></td>
                    <td><?= htmlspecialchars($membership['status_memb']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Statistics</h2>
    <p>Total Monthly Memberships: <?= $monthlyCount ?></p>
    <p>Average Monthly Price: <?= number_format($averageMonthlyPrice, 2) ?></p>
    <p>Total Annual Memberships: <?= $annualCount ?></p>
    <p>Average Annual Price: <?= number_format($averageAnnualPrice, 2) ?></p>
</body>
</html>