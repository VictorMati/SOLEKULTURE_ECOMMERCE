<?php
require_once 'Database.php';

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $categoryId;
    private $imageUrl;
    private $createdDate;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Add a new product
    public function addProduct($name, $description, $price, $stock, $categoryId, $imageUrl) {
        $createdDate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO products (name, description, price, stock, category_id, image_url, created_date) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = [$name, $description, $price, $stock, $categoryId, $imageUrl, $createdDate];

        return $this->db->insert($sql, $params);
    }

    // Update product details
    public function updateProduct($id, $name, $description, $price, $stock, $categoryId, $imageUrl) {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ?, image_url = ? WHERE id = ?";
        $params = [$name, $description, $price, $stock, $categoryId, $imageUrl, $id];

        return $this->db->update($sql, $params);
    }

    // Delete a product
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }

    // Get product by ID
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        return $this->db->fetchOne($sql, [$id]);
    }

    // Get all products
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        return $this->db->fetchAll($sql);
    }

    // Get products by category
    public function getProductsByCategory($categoryId) {
        $sql = "SELECT * FROM products WHERE category_id = ?";
        return $this->db->fetchAll($sql, [$categoryId]);
    }

    // Other getters for private properties
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }
}
?>
