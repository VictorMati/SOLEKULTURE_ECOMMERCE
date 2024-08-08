<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SoleKulture</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Update with actual path -->
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form action="/register" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name="fullName" required>
            
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
            
            <label for="phoneNumber">Phone Number</label>
            <input type="text" id="phoneNumber" name="phoneNumber" required>
            
            <label for="profileImage">Profile Image URL</label>
            <input type="text" id="profileImage" name="profileImage">
            
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
