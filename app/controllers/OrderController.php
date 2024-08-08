<?php
require_once '../models/Order.php';

class OrderController {

    // Admin view all orders
    public static function index() {
        self::checkAdmin();
        $orderModel = new Order();
        $orders = $orderModel->getAllOrders();
        include '../views/admin/orders.php';
    }

    // Admin view details of a specific order
    public static function view($orderId) {
        self::checkAdmin();
        $orderModel = new Order();
        $order = $orderModel->getOrderById($orderId);
        include '../views/admin/view_order.php';
    }

    // Admin update the status of a specific order
    public static function updateStatus($orderId) {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'];
            $orderModel = new Order();
            $orderModel->updateOrderStatus($orderId, $status);
            header('Location: /admin/orders');
            exit();
        } else {
            header('Location: /admin/orders');
            exit();
        }
    }

    // Admin cancel a specific order
    public static function cancel($orderId) {
        self::checkAdmin();
        $orderModel = new Order();
        $orderModel->cancelOrder($orderId);
        header('Location: /admin/orders');
        exit();
    }

    // User view their orders
    public static function userOrders() {
        self::checkUser();
        $userId = $_SESSION['user_id'];
        $orderModel = new Order();
        $orders = $orderModel->getOrdersByUserId($userId);
        include '../views/user/orders.php';
    }

    // User view details of a specific order
    public static function userOrderDetail($orderId) {
        self::checkUser();
        $userId = $_SESSION['user_id'];
        $orderModel = new Order();
        $order = $orderModel->getOrderById($orderId);
        if ($order['user_id'] !== $userId) {
            header('Location: /user/orders');
            exit();
        }
        include '../views/user/view_order.php';
    }

     // Display order history for the logged-in user
     public static function history() {
        // Ensure the user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $userId = $_SESSION['user_id'];
        $orderModel = new Order();
        $orders = $orderModel->getOrdersByUserId($userId);

        include '../views/order/history.php';
    }

    // Check if the user is an admin
    private static function checkAdmin() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: /login');
            exit();
        }
    }

    // Check if the user is a regular user
    private static function checkUser() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
            header('Location: /login');
            exit();
        }
    }
}
?>
