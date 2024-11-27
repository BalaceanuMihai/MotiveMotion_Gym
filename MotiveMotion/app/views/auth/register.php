<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <title>Users</title>
</head>
<body>
<h1>Register</h1>
<form action="/MotiveMotion/auth/storeRegister" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name" required>
    <br>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="role_id">Role ID (1-admin, 2-trainer, 3-member):</label>
    <input type="text" name="role_id" id="role_id" required>
    <br>
    <button type="submit">Register</button>
</form>
</body>
</html>
