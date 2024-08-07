<?php
class Category {
    private $id;
    private $name;
    private $description;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Add a new category
    public function addCategory($name, $description) {
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        $params = [$name, $description];

        return $this->db->insert($sql, $params);
    }

    // Update category details
    public function updateCategory($id, $name, $description) {
        $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
        $params = [$name, $description, $id];

        return $this->db->update($sql, $params);
    }

    // Delete a category
    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }

    // Get category by ID
    public function getCategoryById($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        return $this->db->fetchOne($sql, [$id]);
    }

    // Get all categories
    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        return $this->db->fetchAll($sql);
    }

    // Other getters and setters for private properties
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }
}
?>
