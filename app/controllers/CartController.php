<?php
require_once '../models/Product.php';

class CartController {

    // Display the cart page
    public static function show() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
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

        include '../views/cart/cart.php';
    }

    // Remove an item from the cart
    public static function removeItem($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }

        header('Location: /cart');
        exit();
    }

    // Update the quantity of an item in the cart
    public static function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            if ($quantity > 0) {
                $_SESSION['cart'][$productId] = $quantity;
            } else {
                unset($_SESSION['cart'][$productId]);
            }

            header('Location: /cart');
            exit();
        } else {
            header('Location: /cart');
            exit();
        }
    }
}
?>
