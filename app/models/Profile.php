<?php
class Profile {
    private $id;
    private $userId;
    private $bio;
    private $socialLinks;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Get profile by user ID
    public function getProfile($userId) {
        $sql = "SELECT * FROM profiles WHERE user_id = ?";
        return $this->db->fetchOne($sql, [$userId]);
    }

    // Update profile
    public function updateProfile($userId, $bio, $socialLinks) {
        $sql = "UPDATE profiles SET bio = ?, social_links = ? WHERE user_id = ?";
        $params = [$bio, $socialLinks, $userId];

        return $this->db->update($sql, $params);
    }

    // Delete profile
    public function deleteProfile($userId) {
        $sql = "DELETE FROM profiles WHERE user_id = ?";
        return $this->db->delete($sql, [$userId]);
    }

    // Other getters and setters for private properties
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getBio() {
        return $this->bio;
    }

    public function getSocialLinks() {
        return $this->socialLinks;
    }
}
?>
