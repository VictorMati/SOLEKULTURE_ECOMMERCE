<?php
require_once '../models/User.php';
require_once '../models/Admin.php';
require_once '../models/Product.php';
require_once '../models/Category.php';
require_once '../models/Order.php';
require_once '../models/Review.php';

class AdminController {

    // Admin dashboard
    public static function dashboard() {
        self::checkAdmin();
        include '../views/admin/dashboard.php';
    }

    // User management
    public static function users() {
        self::checkAdmin();
        $users = User::getAllUsers();
        include '../views/admin/users.php';
    }

    public static function addUser() {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = $_POST;
            $admin = new Admin();
            $admin->addUser($userData);
            header('Location: /admin/users');
        } else {
            include '../views/admin/add_user.php';
        }
    }

    public static function editUser($userId) {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = $_POST;
            $admin = new Admin();
            $admin->updateUser($userId, $userData);
            header('Location: /admin/users');
        } else {
            $user = User::getUserById($userId);
            include '../views/admin/edit_user.php';
        }
    }

    public static function deleteUser($userId) {
        self::checkAdmin();
        $admin = new Admin();
        $admin->deleteUser($userId);
        header('Location: /admin/users');
    }

    // Product management
    public static function products() {
        self::checkAdmin();
        $products = Product::getAllProducts();
        include '../views/admin/products.php';
    }

    public static function addProduct() {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = $_POST;
            $product = new Product();
            $product->addProduct($productData['name'], $productData['description'], $productData['price'], $productData['stock'], $productData['categoryId'], $productData['imageUrl']);
            header('Location: /admin/products');
        } else {
            include '../views/admin/add_product.php';
        }
    }

    public static function editProduct($productId) {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = $_POST;
            $product = new Product();
            $product->updateProduct($productId, $productData['name'], $productData['description'], $productData['price'], $productData['stock'], $productData['categoryId'], $productData['imageUrl']);
            header('Location: /admin/products');
        } else {
            $product = Product::getProductById($productId);
            include '../views/admin/edit_product.php';
        }
    }

    public static function deleteProduct($productId) {
        self::checkAdmin();
        $product = new Product();
        $product->deleteProduct($productId);
        header('Location: /admin/products');
    }

    // Category management
    public static function categories() {
        self::checkAdmin();
        $categories = Category::getAllCategories();
        include '../views/admin/categories.php';
    }

    public static function addCategory() {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryData = $_POST;
            $admin = new Admin();
            $admin->addCategory($categoryData);
            header('Location: /admin/categories');
        } else {
            include '../views/admin/add_category.php';
        }
    }

    public static function editCategory($categoryId) {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryData = $_POST;
            $admin = new Admin();
            $admin->updateCategory($categoryId, $categoryData);
            header('Location: /admin/categories');
        } else {
            $category = Category::getCategoryById($categoryId);
            include '../views/admin/edit_category.php';
        }
    }

    public static function deleteCategory($categoryId) {
        self::checkAdmin();
        $admin = new Admin();
        $admin->deleteCategory($categoryId);
        header('Location: /admin/categories');
    }

    // Order management
    public static function orders() {
        self::checkAdmin();
        $orders = Order::getAllOrders();
        include '../views/admin/orders.php';
    }

    public static function manageOrder($orderId) {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderData = $_POST;
            $admin = new Admin();
            $admin->updateOrderStatus($orderId, $orderData['status']);
            header('Location: /admin/orders');
        } else {
            $order = Order::getOrderById($orderId);
            include '../views/admin/edit_order.php';
        }
    }

    // Review management
    public static function reviews() {
        self::checkAdmin();
        $reviews = Review::getAllReviews();
        include '../views/admin/reviews.php';
    }

    public static function deleteReview($reviewId) {
        self::checkAdmin();
        $admin = new Admin();
        $admin->deleteReview($reviewId);
        header('Location: /admin/reviews');
    }

    // Check if user is admin
    private static function checkAdmin() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: /login');
            exit();
        }
    }
}
?>
