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
    public function addUser($username, $password, $email, $fullName, $address, $phoneNumber, $profileImage, $authType) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $signupDate = date('Y-m-d H:i:s');

        $sql = "INSERT INTO users (username, password, email, full_name, address, phone_number, signup_date, profile_image, auth_type) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$username, $hashedPassword, $email, $fullName, $address, $phoneNumber, $signupDate, $profileImage, $authType];
        
        return $this->db->insert($sql, $params);
    }

    // Update existing user information
    public function updateUser($userId, $username, $email, $fullName, $address, $phoneNumber, $profileImage, $authType) {
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
    public function addProduct($name, $description, $price, $stock, $categoryId, $imageUrl) {
        $createdDate = date('Y-m-d H:i:s');

        $sql = "INSERT INTO products (name, description, price, stock, category_id, image_url, created_date) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = [$name, $description, $price, $stock, $categoryId, $imageUrl, $createdDate];
        
        return $this->db->insert($sql, $params);
    }

    // Update existing product information
    public function updateProduct($productId, $name, $description, $price, $stock, $categoryId, $imageUrl) {
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
    public function addCategory($name, $description) {
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        $params = [$name, $description];
        
        return $this->db->insert($sql, $params);
    }

    // Update existing category information
    public function updateCategory($categoryId, $name, $description) {
        $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
        $params = [$name, $description, $categoryId];
        
        return $this->db->update($sql, $params);
    }

    // Delete a category
    public function deleteCategory($categoryId) {
        $sql = "DELETE FROM categories WHERE id = ?";
        return $this->db->delete($sql, [$categoryId]);
    }

    // Manage orders (e.g., view all orders, update order status)
    public function manageOrders() {
        $sql = "SELECT * FROM orders";
        return $this->db->fetchAll($sql);
    }

    // Manage reviews (e.g., view all reviews, delete reviews)
    public function manageReviews() {
        $sql = "SELECT * FROM reviews";
        return $this->db->fetchAll($sql);
    }

    // Update site settings (e.g., update configuration settings)
    public function updateSiteSettings($settingsData) {
        // Assuming $settingsData is an associative array of settings
        foreach ($settingsData as $key => $value) {
            $sql = "UPDATE site_settings SET value = ? WHERE key = ?";
            $params = [$value, $key];
            $this->db->update($sql, $params);
        }
        return true;
    }
}
?>
