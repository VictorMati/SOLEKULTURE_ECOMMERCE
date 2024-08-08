<?php
require_once '../models/Product.php';
require_once '../models/Category.php';

class ShopController {

    // Display the shop main page
    public static function index() {
        $productModel = new Product();
        $categoryModel = new Category();

        $categories = $categoryModel->getAllCategories();
        $products = $productModel->getAllProducts();

        include '../views/shop/index.php';
    }

    // Display products by category
    public static function category($categoryId) {
        $productModel = new Product();
        $categoryModel = new Category();

        $categories = $categoryModel->getAllCategories();
        $products = $productModel->getProductsByCategory($categoryId);

        include '../views/shop/category.php';
    }

    // Display a specific product
    public static function product($productId) {
        $productModel = new Product();

        $product = $productModel->getProductById($productId);

        if (!$product) {
            header('HTTP/1.0 404 Not Found');
            echo "Product not found";
            exit();
        }

        include '../views/shop/product.php';
    }

    // Search for products
    public static function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $searchTerm = $_POST['search'];

            $productModel = new Product();
            // $products = $productModel->searchProducts($searchTerm);

            include '../views/shop/search_results.php';
        } else {
            header('Location: /shop');
        }
    }

    // Handle adding a product to the cart
    public static function addToCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId] += $quantity;
            } else {
                $_SESSION['cart'][$productId] = $quantity;
            }

            header('Location: /cart');
        } else {
            header('Location: /shop');
        }
    }
}
?>
