<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SoleKulture</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Update with actual path -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="admin-wrapper">
        <!-- Admin Header -->
        <?php include 'admin_header.php'; ?>

        <div class="admin-main">
            <!-- Admin Sidebar -->
            <?php include 'admin_sidebar.php'; ?>

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
        </div>

        <!-- Admin Footer -->
        <?php include 'admin_footer.php'; ?>
    </div>

    <script src="path/to/your/js/scripts.js"></script> <!-- Update with actual path -->
</body>
</html>
