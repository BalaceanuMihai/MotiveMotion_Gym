<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Membership</title>
</head>
<body>
<h1>Edit Membership</h1>
<form action="/MotiveMotion/memberships/update/<?php echo htmlspecialchars($membership['id']); ?>" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($membership['id']); ?>">
    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" id="user_id" value="<?php echo htmlspecialchars($membership['user_id']); ?>" required>
    <br>
    <label for="price">Price:</label>
    <input type="text" name="price" id="price" value="<?php echo htmlspecialchars($membership['price']); ?>" required>
    <br>
    <label for="type_memb">Type:</label>
    <select name="type_memb" id="type_memb" required>
        <option value="monthly" <?php echo $membership['type_memb'] == 'monthly' ? 'selected' : ''; ?>>Monthly</option>
        <option value="annual" <?php echo $membership['type_memb'] == 'annual' ? 'selected' : ''; ?>>Annual</option>
    </select>
    <br>
    <label for="starting_date">Starting Date:</label>
    <input type="date" name="starting_date" id="starting_date" value="<?php echo htmlspecialchars($membership['starting_date']); ?>" required>
    <br>
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date" value="<?php echo htmlspecialchars($membership['end_date']); ?>">
    <br>
    <label for="status_memb">Status:</label>
    <select name="status_memb" id="status_memb" required>
        <option value="active" <?php echo $membership['status_memb'] == 'active' ? 'selected' : ''; ?>>Active</option>
        <option value="inactive" <?php echo $membership['status_memb'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
        <option value="expired" <?php echo $membership['status_memb'] == 'expired' ? 'selected' : ''; ?>>Expired</option>
    </select>
    <br>
    <button type="submit">Update</button>
</form>
</body>
</html>