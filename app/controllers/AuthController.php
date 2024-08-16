<?php
require_once '../models/User.php';
require_once '../models/Admin.php';

class AuthController {
    public static function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $fullName = $_POST['full_name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $profileImage = $_FILES['profile_image']['tmp_name'] ?? null; // Handle profile image upload
            $authType = 'normal'; // Default auth type

            // Check if passwords match
            if ($password !== $confirmPassword) {
                $error = "Passwords do not match.";
                include '../views/pages/register.php';
                return;
            }

            // Validate the uploaded file
            if ($profileImage && !is_uploaded_file($profileImage)) {
                $error = "Invalid profile image.";
                include '../views/pages/register.php';
                return;
            }

            // Handle file upload if needed
            $profileImagePath = null;
            if ($profileImage) {
                $uploadDir = '../public/uploads/';
                $profileImagePath = $uploadDir . basename($_FILES['profile_image']['name']);
                if (!move_uploaded_file($profileImage, $profileImagePath)) {
                    $error = "Failed to upload profile image.";
                    include '../views/pages/register.php';
                    return;
                }
            }

            // Proceed with registration
            $user = new User();
            if ($user->register($username, $password, $email, $fullName, $address, $phone, $profileImagePath, $authType)) {
                header('Location: /login');
                exit();
            } else {
                $error = "Registration failed. Please try again.";
                include '../views/pages/register.php';
            }
        } else {
            include '../views/pages/register.php';
        }
    }

    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            $admin = new Admin();

            if ($user->login($username, $password)) {
                header('Location: /home');
                exit();
            } elseif ($admin->login($username, $password)) {
                header('Location: /admin/dashboard');
                exit();
            } else {
                $error = "Invalid username or password.";
                include '../views/pages/login.php';
            }
        } else {
            include '../views/pages/login.php';
        }
    }

    public static function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
        exit();
    }

    public static function handleGoogleAuth() {
        // Google auth logic
    }

    public static function handleFacebookAuth() {
        // Facebook auth logic
    }

    public static function handleMicrosoftAuth() {
        // Microsoft auth logic
    }
}
?>
