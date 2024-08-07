<?php
class Review {
    private $id;
    private $userId;
    private $productId;
    private $rating;
    private $comment;
    private $createdDate;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Add a new review
    public function addReview($userId, $productId, $rating, $comment) {
        $createdDate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO reviews (user_id, product_id, rating, comment, created_date) 
                VALUES (?, ?, ?, ?, ?)";
        $params = [$userId, $productId, $rating, $comment, $createdDate];

        return $this->db->insert($sql, $params);
    }

    // Update an existing review
    public function updateReview($id, $rating, $comment) {
        $sql = "UPDATE reviews SET rating = ?, comment = ? WHERE id = ?";
        $params = [$rating, $comment, $id];

        return $this->db->update($sql, $params);
    }

    // Delete a review
    public function deleteReview($id) {
        $sql = "DELETE FROM reviews WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }

    // Get reviews by product ID
    public function getReviewsByProductId($productId) {
        $sql = "SELECT * FROM reviews WHERE product_id = ?";
        return $this->db->fetchAll($sql, [$productId]);
    }

    // Get reviews by user ID
    public function getReviewsByUserId($userId) {
        $sql = "SELECT * FROM reviews WHERE user_id = ?";
        return $this->db->fetchAll($sql, [$userId]);
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

    public function getRating() {
        return $this->rating;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }
}
?>
