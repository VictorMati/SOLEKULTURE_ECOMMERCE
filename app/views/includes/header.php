<header class="main-header">
    <div class="main-header__container">
        <div class="main-header__left">
            <a href="/index.php" class="main-header__logo-link">
                <i class="fa fa-bars" aria-hidden="true">minimize sidebar</i>
            </a>
        </div>
        <div class="main-header__center">
            <input type="text" class="main-header__search-bar" placeholder="Search...">
        </div>
        <div class="main-header__right">
            <nav class="main-header__nav">
                <a href="/contact.php" class="main-header__nav-link">Contact</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="main-header__profile-dropdown">
                        <img src="/public/images/<?php echo $_SESSION['profile_image']; ?>" alt="Profile" class="main-header__profile-image">
                        <div class="main-header__dropdown-content">
                            <a href="/profile.php">Profile</a>
                            <a href="/settings.php">Settings</a>
                            <a href="/contact_seller.php">Contact Seller</a>
                            <a href="/edit_profile.php">Edit Profile</a>
                            <a href="/logout.php">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="/login.php" class="main-header__nav-link">Login</a>
                    <a href="/register.php" class="main-header__nav-link">Register</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>
