<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoleKulture -<?php echo isset($view) ? $view : ''; ?></title>
    <link rel="stylesheet" href="/public/css/main_styles.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="main-wrapper">
        <!-- Main Sidebar -->
        <div class="main-sidebar">
            <?php include 'sidebar.php'; ?>
        </div>

        <div class="main-content-wrapper">
            <!-- Main Header -->
            <div class="main-header">
                <?php include 'header.php'; ?>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?php 
                // Include the dynamic content based on routing
                if (isset($view)) {
                    include $view;
                } else {
                    include 'home.php';
                }
                ?>
            </div>

            <!-- Main Footer -->
            <div class="main-footer">
                <?php include 'footer.php'; ?>
            </div>
        </div>
    </div>

    <script src="path/to/your/js/scripts.js"></script> <!-- Update with actual path -->
</body>
</html>
