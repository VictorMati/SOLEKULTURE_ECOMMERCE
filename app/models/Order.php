<?php
class Order {
    private $id;
    private $userId;
    private $totalAmount;
    private $status;
    private $createdDate;
    private $shippingAddress;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Create a new order
    public function createOrder($userId, $totalAmount, $shippingAddress) {
        $createdDate = date('Y-m-d H:i:s');
        $status = 'Pending';
        $sql = "INSERT INTO orders (user_id, total_amount, status, created_date, shipping_address) 
                VALUES (?, ?, ?, ?, ?)";
        $params = [$userId, $totalAmount, $status, $createdDate, $shippingAddress];

        return $this->db->insert($sql, $params);
    }

    // Update order status
    public function updateOrderStatus($id, $status) {
        $sql = "UPDATE orders SET status = ? WHERE id = ?";
        return $this->db->update($sql, [$status, $id]);
    }

    // Get order by ID
    public function getOrderById($id) {
        $sql = "SELECT * FROM orders WHERE id = ?";
        return $this->db->fetchOne($sql, [$id]);
    }

    // Get orders by user ID
    public function getOrdersByUserId($userId) {
        $sql = "SELECT * FROM orders WHERE user_id = ?";
        return $this->db->fetchAll($sql, [$userId]);
    }

    public static function getAllOrders() {
        $db = new Database();
        $sql = "SELECT * FROM orders";
        return $db->fetchAll($sql);
    }
    

    // Cancel an order
    public function cancelOrder($id) {
        $sql = "UPDATE orders SET status = 'Cancelled' WHERE id = ?";
        return $this->db->update($sql, ['Cancelled', $id]);
    }

    // Other getters and setters for private properties
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getTotalAmount() {
        return $this->totalAmount;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function getShippingAddress() {
        return $this->shippingAddress;
    }
}
?>
