<?php
require_once 'Database.php';

class Home {
    private $id;
    private $title;
    private $content;
    private $imageUrl;
    private $displayOrder;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Get all showcases
    public function getShowcases() {
        $sql = "SELECT * FROM home_showcases ORDER BY display_order";
        return $this->db->fetchAll($sql);
    }

    // Add a new showcase
    public function addShowcase($title, $content, $imageUrl, $displayOrder) {
        $sql = "INSERT INTO home_showcases (title, content, image_url, display_order) 
                VALUES (?, ?, ?, ?)";
        $params = [$title, $content, $imageUrl, $displayOrder];
        
        return $this->db->insert($sql, $params);
    }

    // Update an existing showcase
    public function updateShowcase($id, $title, $content, $imageUrl, $displayOrder) {
        $sql = "UPDATE home_showcases SET title = ?, content = ?, image_url = ?, display_order = ? WHERE id = ?";
        $params = [$title, $content, $imageUrl, $displayOrder, $id];
        
        return $this->db->update($sql, $params);
    }

    // Delete a showcase
    public function deleteShowcase($id) {
        $sql = "DELETE FROM home_showcases WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }

    // Other getters and setters for private properties
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function getDisplayOrder() {
        return $this->displayOrder;
    }
}
?>
