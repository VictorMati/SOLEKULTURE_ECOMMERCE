<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SoleKulture</title>
    <link rel="stylesheet" href="/public/css/login.css"> 
    <link rel="stylesheet" href="/public/css/global.css">
    <style>

    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Section with Company Logo and Sign Up Button -->
        <div class="left-section">
            <!-- <img src="/public/images/app_images/logo.jfif" alt="SoleKulture Logo">  -->
            <h1>SoleKulture</h1>
            <!-- <p>Your tagline or brief description here.</p> -->
            <a href="/register" class="signup-btn">Sign Up</a>
        </div>

        <!-- Right Section with Login Form -->
        <div class="right-section">
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

            <div class="forgot-password">
                <a href="/forgot-password">Forgot your password?</a>
            </div>

            <div class="social-login">
                <p>Or login with:</p>
                <button onclick="location.href='/auth/google'">Google</button>
                <button onclick="location.href='/auth/facebook'">Facebook</button>
                <button onclick="location.href='/auth/microsoft'">Microsoft</button>
            </div>
        </div>
    </div>
</body>
</html>
