<?php
require_once 'Database.php';
require_once 'Profile.php';
require_once 'Auth.php';
require_once 'Order.php';
require_once 'Review.php';

class User {
    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $fullName;
    protected $address;
    protected $phoneNumber;
    protected $signupDate;
    protected $profileImage;
    protected $authType;
    protected $db;
    protected $profile;
    protected $auth;
    protected $orders;
    protected $reviews;

    public function __construct() {
        $this->db = new Database();
        $this->profile = new Profile();
        $this->auth = new Auth();
        $this->orders = [];
        $this->reviews = [];
    }

    // Register a new user
    public function register($username, $password, $email, $fullName, $address, $phoneNumber, $profileImage, $authType) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $signupDate = date('Y-m-d H:i:s');

        $sql = "INSERT INTO users (username, password, email, full_name, address, phone_number, signup_date, profile_image, auth_type) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$username, $hashedPassword, $email, $fullName, $address, $phoneNumber, $signupDate, $profileImage, $authType];
        
        return $this->db->insert($sql, $params);
    }

    // Login a user
    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $user = $this->db->fetchOne($sql, [$username]);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['auth_type'];

            if ($user['auth_type'] === 'admin') {
                header("Location: /admin/dashboard");
            } else {
                header("Location: /");
            }
            exit;
        } else {
            return false;
        }
    }

    // Logout a user
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: /login");
        exit();
    }

    // Update user profile
    public function updateProfile($id, $bio, $socialLinks) {
        return $this->profile->updateProfile($id, $bio, $socialLinks);
    }

    // Get user profile
    public function getProfile($userId) {
        return $this->profile->getProfile($userId);
    }

    // Delete user profile
    public function deleteProfile($userId) {
        return $this->profile->deleteProfile($userId);
    }

    // Handle Google authentication
    public function handleGoogleAuth($googleId, $token) {
        return $this->auth->handleGoogleAuth($googleId, $token);
    }

    // Handle Facebook authentication
    public function handleFacebookAuth($facebookId, $token) {
        return $this->auth->handleFacebookAuth($facebookId, $token);
    }

    // Handle Microsoft authentication
    public function handleMicrosoftAuth($microsoftId, $token) {
        return $this->auth->handleMicrosoftAuth($microsoftId, $token);
    }

    // Delete a user account
    public function deleteAccount($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }

    // Get all users
    public static function getAllUsers() {
        $db = new Database();
        $sql = "SELECT * FROM users";
        return $db->fetchAll($sql);
    }

    // Get user by ID
    public static function getUserById($userId) {
        $db = new Database();
        $sql = "SELECT * FROM users WHERE id = ?";
        return $db->fetchOne($sql, [$userId]);
    }

    // Getters for private properties
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function getSignupDate() {
        return $this->signupDate;
    }

    public function getProfileImage() {
        return $this->profileImage;
    }

    public function getAuthType() {
        return $this->authType;
    }
}
?>
