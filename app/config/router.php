<?php
// Include the configuration file to access defined constants
require_once __DIR__ . '/../config/config.php'; // Adjust path based on the location of config.php

// Include necessary files
require_once BASE_PATH . 'controllers/AuthController.php';
require_once BASE_PATH . 'controllers/HomeController.php';
require_once BASE_PATH . 'controllers/ProfileController.php';
require_once BASE_PATH . 'controllers/ShopController.php';
require_once BASE_PATH . 'controllers/ProductController.php';
require_once BASE_PATH . 'controllers/CartController.php';
require_once BASE_PATH . 'controllers/CheckoutController.php';
require_once BASE_PATH . 'controllers/OrderController.php';
require_once BASE_PATH . 'controllers/AdminController.php';

// Get the requested URL path
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Remove query string from URI
if (strpos($requestUri, '?') !== false) {
    $requestUri = substr($requestUri, 0, strpos($requestUri, '?'));
}

// Route the request
switch ($requestUri) {
    case '/':
    case '/home':
        HomeController::index();
        break;
    case '/profile':
        ProfileController::show();
        break;
    case '/shop':
        ShopController::index();
        break;
    case (preg_match('/^\/product\/(\d+)$/', $requestUri, $matches) ? true : false):
        ProductController::show($matches[1]);
        break;
    case '/cart':
        CartController::show();
        break;
    case '/checkout':
        CheckoutController::index();
        break;
    case '/order-history':
        OrderController::history();
        break;
    case '/login':
        AuthController::login();
        break;
    case '/register':
        AuthController::register();
        break;
    case '/logout':
        AuthController::logout();
        break;
    case '/admin':
    case '/admin/dashboard':
        AdminController::dashboard();
        break;
    case '/admin/users':
        AdminController::users();
        break;
    case '/admin/products':
        AdminController::products();
        break;
    case (preg_match('/^\/admin\/product\/edit\/(\d+)$/', $requestUri, $matches) ? true : false):
        AdminController::editProduct($matches[1]);
        break;
    case '/admin/orders':
        AdminController::orders();
        break;
    case '/admin/reviews':
        AdminController::reviews();
        break;
    default:
        // 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo "Page not found";
        break;
}
?>
