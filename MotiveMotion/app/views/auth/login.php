<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/picnic">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Users</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <form action="/MotiveMotion/auth/storeLogin" method="post">
        <label for="email">Username(in this case email adress):</label>
        <input type="text" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
        <br>
        <br>
        <div class="g-recaptcha" data-sitekey="6Lf5j6EqAAAAADK-BFFjHr2DFPfMR9xKi_f9zdJK"></div>
    </form>
</body>
</html>
