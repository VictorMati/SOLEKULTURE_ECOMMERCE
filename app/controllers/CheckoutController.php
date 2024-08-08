<?php
require_once '../models/Product.php';
require_once '../models/Order.php';

class CheckoutController {

    // Display the checkout page
    public static function index() {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            header('Location: /cart');
            exit();
        }

        $productModel = new Product();
        $cartItems = [];

        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $product = $productModel->getProductById($productId);
            if ($product) {
                $product['quantity'] = $quantity;
                $cartItems[] = $product;
            }
        }

        $totalAmount = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        include '../views/checkout/checkout.php';
    }

    // Handle checkout process
    public static function process() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                header('Location: /cart');
                exit();
            }

            $orderModel = new Order();
            $userId = $_SESSION['user_id'];
            $totalAmount = $_POST['total_amount'];
            $shippingAddress = $_POST['shipping_address'];
            $createdDate = date('Y-m-d H:i:s');

            // Create order
            $orderId = $orderModel->createOrder($userId, $totalAmount, $shippingAddress);

            if ($orderId) {
                // Add order items
                foreach ($_SESSION['cart'] as $productId => $quantity) {
                    $product = (new Product())->getProductById($productId);
                    if ($product) {
                        // Use a method to add order items if implemented
                        // $orderModel->addOrderItem($orderId, $productId, $quantity, $product['price']);
                    }
                }

                // Clear the cart
                unset($_SESSION['cart']);

                // Redirect to order confirmation page
                header('Location: /order-confirmation?order_id=' . $orderId);
                exit();
            } else {
                // Handle order creation failure
                header('Location: /checkout?error=Order creation failed');
                exit();
            }
        } else {
            // Redirect if not a POST request
            header('Location: /checkout');
            exit();
        }
    }
}
?>
