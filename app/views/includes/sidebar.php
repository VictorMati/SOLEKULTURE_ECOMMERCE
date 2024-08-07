<aside class="main-sidebar">
    <div class="main-sidebar__container">
        <ul class="main-sidebar__nav-list">
            <li class="main-sidebar__nav-item"><a href="/index.php" class="main-sidebar__nav-link">Home</a></li>
            <li class="main-sidebar__nav-item"><a href="/shop.php" class="main-sidebar__nav-link">Shop</a></li>
            <li class="main-sidebar__nav-item"><a href="/categories.php" class="main-sidebar__nav-link">Categories</a></li>
            <li class="main-sidebar__nav-item"><a href="/cart.php" class="main-sidebar__nav-link">Cart</a></li>
            <li class="main-sidebar__nav-item"><a href="/orders.php" class="main-sidebar__nav-link">Orders</a></li>
            <li class="main-sidebar__nav-item"><a href="/contact.php" class="main-sidebar__nav-link">Contact</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li class="main-sidebar__nav-item"><a href="/profile.php" class="main-sidebar__nav-link">Profile</a></li>
                <li class="main-sidebar__nav-item"><a href="/logout.php" class="main-sidebar__nav-link">Logout</a></li>
            <?php else: ?>
                <li class="main-sidebar__nav-item"><a href="/login.php" class="main-sidebar__nav-link">Login</a></li>
                <li class="main-sidebar__nav-item"><a href="/register.php" class="main-sidebar__nav-link">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
