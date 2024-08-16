<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - SoleKulture</title>
    <link rel="stylesheet" href="/public/css/global.css">
    <link rel="stylesheet" href="/public/css/register.css">
</head>
<body>
    <div class="signup-container">
        <!-- Left Section with Company Logo and Login Button -->
        <div class="left-section">
            <h1>SoleKulture</h1>
            <a href="/login" class="login-btn">Login</a>
        </div>

        <!-- Right Section with Sign Up Form -->
        <div class="right-section">
            <h1>Sign Up</h1>
            <?php if (isset($error)): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <form action="/register" method="post" enctype="multipart/form-data">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required>

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>

                <label for="profile_image">Profile Image</label>
                <input type="file" id="profile_image" name="profile_image">

                <button type="submit">Sign Up</button>
            </form>

            <div class="social-signup">
                <p>Or sign up with:</p>
                <button onclick="location.href='/auth/google'">Google</button>
                <button onclick="location.href='/auth/facebook'">Facebook</button>
                <button onclick="location.href='/auth/microsoft'">Microsoft</button>
            </div>
        </div>
    </div>
</body>
</html>
