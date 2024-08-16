<?php
// Start the session
session_start();

// Include the configuration file to access defined constants
require_once __DIR__ . '/app/config/config.php'; // Adjust path based on the location of config.php

// Autoload required files
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name); // Handle namespaced classes if any

    // Define paths
    $controllersPath = BASE_PATH . 'controllers/' . $class_name . '.php';
    $modelsPath = BASE_PATH . 'models/' . $class_name . '.php';
    
    // Include the controller file if it exists
    if (file_exists($controllersPath)) {
        require_once $controllersPath;
    }
    
    // Include the model file if it exists
    if (file_exists($modelsPath)) {
        require_once $modelsPath;
    }
});

// Database connection
require_once BASE_PATH . 'config/database.php'; // Adjust the path to the database configuration file

// Include router
require_once BASE_PATH . 'config/router.php'; // Adjust path based on the location of router.php
?>
