<?php
require_once '../models/User.php';
require_once '../models/Profile.php';

class ProfileController {

    // Show user profile
    public static function show() {
        self::checkAuth();
        $userId = $_SESSION['user_id'];
        $userModel = new User();
        $profile = $userModel->getProfile($userId);
        include '../views/profile.php';
    }

    // Edit user profile
    public static function edit() {
        self::checkAuth();
        $userId = $_SESSION['user_id'];
        $userModel = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bio = $_POST['bio'];
            $socialLinks = $_POST['social_links']; // Assuming it's a JSON string or similar format
            
            $success = $userModel->updateProfile($userId, $bio, $socialLinks);

            if ($success) {
                header('Location: /profile');
            } else {
                $error = "Failed to update profile.";
                include '../views/edit_profile.php';
            }
        } else {
            $profile = $userModel->getProfile($userId);
            include '../views/edit_profile.php';
        }
    }

    // Delete user profile
    public static function delete() {
        self::checkAuth();
        $userId = $_SESSION['user_id'];
        $userModel = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = $userModel->deleteProfile($userId);

            if ($success) {
                $userModel->logout();
                header('Location: /');
            } else {
                $error = "Failed to delete profile.";
                include '../views/profile.php';
            }
        } else {
            include '../views/delete_profile.php';
        }
    }

    // Helper method to check if the user is authenticated
    private static function checkAuth() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
    }
}
?>
