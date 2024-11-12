<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Memberships</title>
</head>
<body>
<h1>All Memberships</h1>
<table>
    <tr>
        <th>Price</th>
        <th>Type</th>
        <th>Status</th>
    </tr>
    <?php foreach ($memberships as $membership) : ?>
        <tr>
            <td><?= $membership["price"] ?></td>
            <td><?= $membership["type_memb"] ?></td>
            <td><?= $membership["status_memb"] ?></td>
        </tr>
    <?php endforeach; ?>
    
</body>
</html>