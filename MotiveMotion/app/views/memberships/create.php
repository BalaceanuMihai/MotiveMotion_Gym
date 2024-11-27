<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Create Membership</title>
</head>
<body>
    <h1>Create New Membership</h1>
     <!-- Actualizare action pentru a trimite datele la MembershipController -->
     <form action="/MotiveMotion/memberships/store" method="post">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required>
        <br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        <br>

        <label for="type_memb">Type:</label>
        <select id="type_memb" name="type_memb" required>
            <option value="monthly">Monthly</option>
            <option value="annual">Annual</option>
        </select>
        <br>

        <label for="starting_date">Starting Date:</label>
        <input type="date" id="starting_date" name="starting_date" required>
        <br>

        <label for="end_date">End Date (optional):</label>
        <input type="date" id="end_date" name="end_date">
        <br>

        <button type="submit">Create Membership</button>
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>
