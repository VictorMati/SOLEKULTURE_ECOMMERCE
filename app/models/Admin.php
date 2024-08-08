<?php
require_once 'User.php';
require_once 'Product.php';
require_once 'Category.php';
require_once 'Order.php';
require_once 'Review.php';

class Admin extends User {
    private $role;

    public function __construct() {
        parent::__construct();
        $this->role = 'admin';
    }

    // Add a new user
    public function addUser($userData) {
        $username = $userData['username'];
        $password = $userData['password'];
        $email = $userData['email'];
        $fullName = $userData['fullName'];
        $address = $userData['address'];
        $phoneNumber = $userData['phoneNumber'];
        $profileImage = $userData['profileImage'];
        $authType = $userData['authType'];
        return parent::register($username, $password, $email, $fullName, $address, $phoneNumber, $profileImage, $authType);
    }

    // Update existing user information
    public function updateUser($userId, $userData) {
        $username = $userData['username'];
        $email = $userData['email'];
        $fullName = $userData['fullName'];
        $address = $userData['address'];
        $phoneNumber = $userData['phoneNumber'];
        $profileImage = $userData['profileImage'];
        $authType = $userData['authType'];

        $sql = "UPDATE users SET username = ?, email = ?, full_name = ?, address = ?, phone_number = ?, profile_image = ?, auth_type = ? WHERE id = ?";
        $params = [$username, $email, $fullName, $address, $phoneNumber, $profileImage, $authType, $userId];
        
        return $this->db->update($sql, $params);
    }

    // Delete a user
    public function deleteUser($userId) {
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->db->delete($sql, [$userId]);
    }

    // Add a new product
    public function addProduct($productData) {
        $name = $productData['name'];
        $description = $productData['description'];
        $price = $productData['price'];
        $stock = $productData['stock'];
        $categoryId = $productData['categoryId'];
        $imageUrl = $productData['imageUrl'];
        $createdDate = date('Y-m-d H:i:s');

        $sql = "INSERT INTO products (name, description, price, stock, category_id, image_url, created_date) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = [$name, $description, $price, $stock, $categoryId, $imageUrl, $createdDate];
        
        return $this->db->insert($sql, $params);
    }

    // Update existing product information
    public function updateProduct($productId, $productData) {
        $name = $productData['name'];
        $description = $productData['description'];
        $price = $productData['price'];
        $stock = $productData['stock'];
        $categoryId = $productData['categoryId'];
        $imageUrl = $productData['imageUrl'];

        $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ?, image_url = ? WHERE id = ?";
        $params = [$name, $description, $price, $stock, $categoryId, $imageUrl, $productId];
        
        return $this->db->update($sql, $params);
    }

    // Delete a product
    public function deleteProduct($productId) {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->db->delete($sql, [$productId]);
    }

    // Add a new category
    public function addCategory($categoryData) {
        $name = $categoryData['name'];
        $description = $categoryData['description'];

        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        $params = [$name, $description];
        
        return $this->db->insert($sql, $params);
    }

    // Update existing category information
    public function updateCategory($categoryId, $categoryData) {
        $name = $categoryData['name'];
        $description = $categoryData['description'];

        $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
        $params = [$name, $description, $categoryId];
        
        return $this->db->update($sql, $params);
    }

    // Delete a category
    public function deleteCategory($categoryId) {
        $sql = "DELETE FROM categories WHERE id = ?";
        return $this->db->delete($sql, [$categoryId]);
    }

    // Update order status
    public function updateOrderStatus($orderId, $status) {
        $sql = "UPDATE orders SET status = ? WHERE id = ?";
        $params = [$status, $orderId];
        return $this->db->update($sql, $params);
    }

    // Delete a review
    public function deleteReview($reviewId) {
        $sql = "DELETE FROM reviews WHERE id = ?";
        return $this->db->delete($sql, [$reviewId]);
    }

    // Fetch all orders
    public function getAllOrders() {
        $sql = "SELECT * FROM orders";
        return $this->db->fetchAll($sql);
    }

    // Fetch order by ID
    public function getOrderById($orderId) {
        $sql = "SELECT * FROM orders WHERE id = ?";
        return $this->db->fetchOne($sql, [$orderId]);
    }

    // Fetch all reviews
    public function getAllReviews() {
        $sql = "SELECT * FROM reviews";
        return $this->db->fetchAll($sql);
    }

    // Fetch review by ID
    public function getReviewById($reviewId) {
        $sql = "SELECT * FROM reviews WHERE id = ?";
        return $this->db->fetchOne($sql, [$reviewId]);
    }
}
?>
