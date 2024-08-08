<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SoleKulture</title>
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="admin-wrapper">
        <!-- Admin Sidebar -->
        <div class="admin-sidebar">
            <?php include 'admin_sidebar.php'; ?>
        </div>

        <div class="admin-content-wrapper">
            <!-- Admin Header -->
            <div class="admin-header">
                <?php include 'admin_header.php'; ?>
            </div>

            <!-- Admin Content -->
            <div class="admin-content">
                <?php 
                // Include the dynamic content based on routing
                if (isset($view)) {
                    include $view;
                } else {
                    include 'admin_dashboard.php'; // Default admin dashboard page
                }
                ?>
            </div>

            <!-- Admin Footer -->
            <div class="admin-footer">
                <?php include 'admin_footer.php'; ?>
            </div>
        </div>
    </div>

    <script src="path/to/your/js/scripts.js"></script> <!-- Update with actual path -->
</body>
</html>
