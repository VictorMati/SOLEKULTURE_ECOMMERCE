<?php
require_once '../models/Home.php';
require_once '../views/home.php';

class HomeController {
    public static function index() {
        $home = new Home();
        $showcases = $home->getShowcases();
        
        // Fetch featured products (assuming the method exists)
        $product = new Product();
        $featuredProducts = $product->getAllProducts(); // Modify as necessary to fetch featured products
        
        // Fetch categories
        $category = new Category();
        $categories = $category->getAllCategories();

        // Include the home view and pass the fetched data
        include '../views/home.php';
    }
}
?>
