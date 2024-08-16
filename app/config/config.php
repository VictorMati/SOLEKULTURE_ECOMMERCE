<?php
// Define the base path of the project
define('BASE_PATH', __DIR__ . '/');

// Define the path to the public directory
define('PUBLIC_PATH', BASE_PATH . 'public/');

// Define the path to the uploads directory
define('UPLOADS_PATH', BASE_PATH . 'public/uploads/');

// Database connection settings
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');

// Define the base URL of the application (adjust as needed)
define('BASE_URL', 'http://localhost/your_project/');

// Set default timezone
date_default_timezone_set('UTC');

// Other global settings
define('APP_NAME', 'SoleKulture');
define('ADMIN_EMAIL', 'admin@example.com');

// Autoload configuration (if using Composer)
// require_once BASE_PATH . 'vendor/autoload.php';
?>
