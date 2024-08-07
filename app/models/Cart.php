<?php
class Cart {
    private $id;
    private $userId;
    private $productId;
    private $quantity;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Add a product to the cart
    public function addToCart($userId, $productId, $quantity) {
        $sql = "INSERT INTO carts (user_id, product_id, quantity) VALUES (?, ?, ?)
                ON DUPLICATE KEY UPDATE quantity = quantity + ?";
        $params = [$userId, $productId, $quantity, $quantity];

        return $this->db->insert($sql, $params);
    }

    // Update cart item quantity
    public function updateCart($userId, $productId, $quantity) {
        $sql = "UPDATE carts SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $params = [$quantity, $userId, $productId];

        return $this->db->update($sql, $params);
    }

    // Remove a product from the cart
    public function removeFromCart($userId, $productId) {
        $sql = "DELETE FROM carts WHERE user_id = ? AND product_id = ?";
        return $this->db->delete($sql, [$userId, $productId]);
    }

    // Get cart items by user ID
    public function getCartByUserId($userId) {
        $sql = "SELECT * FROM carts WHERE user_id = ?";
        return $this->db->fetchAll($sql, [$userId]);
    }

    // Clear the cart for a user
    public function clearCart($userId) {
        $sql = "DELETE FROM carts WHERE user_id = ?";
        return $this->db->delete($sql, [$userId]);
    }

    // Other getters and setters for private properties
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getProductId() {
        return $this->productId;
    }

    public function getQuantity() {
        return $this->quantity;
    }
}
?>
