<?php
// Start the session
session_start();

// Autoload required files
spl_autoload_register(function ($class_name) {
    $path = '/app/controllers/' . $class_name . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
    $path = '/app/models/' . $class_name . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

// Database connection (update with your database credentials)
require_once '../app/config/database.php';

// Include router
require_once '../app/controllers/router.php';
?>
