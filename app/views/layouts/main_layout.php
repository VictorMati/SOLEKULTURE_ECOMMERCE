<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoleKulture </title>
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
            <?php include '../includes/sidebar.php'; ?>
        </div>

        <div class="main-content-wrapper">
            <!-- Main Header -->
            <div class="main-header">
                <?php include '../includes/header.php'; ?>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?php 
                // Include the dynamic content based on routing
                if (isset($view)) {
                    include $view;
                } else {
                    include '../pages/home.php';
                }
                ?>
            </div>

            <!-- Main Footer -->
            <div class="main-footer">
                <?php include '../includes/footer.php'; ?>
            </div>
        </div>
    </div>

    <script src="path/to/your/js/scripts.js"></script> 
</body>
</html>
