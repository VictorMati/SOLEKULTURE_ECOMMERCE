<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SoleKulture</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Update with actual path -->
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form action="/login" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <div class="social-login">
            <p>Or login with:</p>
            <button onclick="location.href='/auth/google'">Google</button>
            <button onclick="location.href='/auth/facebook'">Facebook</button>
            <button onclick="location.href='/auth/microsoft'">Microsoft</button>
        </div>
    </div>
</body>
</html>
