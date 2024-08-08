<?php
require_once '../models/Product.php';
require_once '../models/Category.php';

class ProductController {

    // Display all products
    public static function index() {
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        include '../views/products/products.php';
    }

    // View details of a specific product
    // public static function show($productId) {
    //     $productModel = new Product();
    //     $product = $productModel->getProductById($productId);
    //     include '../views/products/view_product.php';
    // }

        // Display a single product based on the product ID
        public static function show($productId) {
            $productModel = new Product();
            $product = $productModel->getProductById($productId);
    
            if (!$product) {
                // Handle the case where the product is not found
                echo 'Product not found';
                exit();
            }
    
            // Include the view to display the product details
            include '../views/product/view_product.php';
        }

    // Add a new product (Admin only)
    public static function add() {
        self::checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = $_POST;
            $productModel = new Product();
            $productModel->addProduct(
                $productData['name'],
                $productData['description'],
                $productData['price'],
                $productData['stock'],
                $productData['category_id'],
                $productData['image_url']
            );
            header('Location: /admin/products');
            exit();
        } else {
            $categoryModel = new Category();
            $categories = $categoryModel->getAllCategories();
            include '../views/admin/add_product.php';
        }
    }

    // Edit a specific product (Admin only)
    public static function edit($productId) {
        self::checkAdmin();
        $productModel = new Product();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = $_POST;
            $productModel->updateProduct(
                $productId,
                $productData['name'],
                $productData['description'],
                $productData['price'],
                $productData['stock'],
                $productData['category_id'],
                $productData['image_url']
            );
            header('Location: /admin/products');
            exit();
        } else {
            $product = $productModel->getProductById($productId);
            $categoryModel = new Category();
            $categories = $categoryModel->getAllCategories();
            include '../views/admin/edit_product.php';
        }
    }

    // Delete a specific product (Admin only)
    public static function delete($productId) {
        self::checkAdmin();
        $productModel = new Product();
        $productModel->deleteProduct($productId);
        header('Location: /admin/products');
        exit();
    }

    // Check if the user is an admin
    private static function checkAdmin() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: /login');
            exit();
        }
    }
}
?>
