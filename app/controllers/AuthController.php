<?php
require_once '../models/User.php';
require_once '../models/Admin.php';

class AuthController {
    public static function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $fullName = $_POST['fullName'];
            $address = $_POST['address'];
            $phoneNumber = $_POST['phoneNumber'];
            $profileImage = $_POST['profileImage'] ?? null;
            $authType = 'normal'; // Default auth type

            $user = new User();
            if ($user->register($username, $password, $email, $fullName, $address, $phoneNumber, $profileImage, $authType)) {
                header('Location: /login');
                exit();
            } else {
                $error = "Registration failed. Please try again.";
                include '../views/register.php';
            }
        } else {
            include '../views/register.php';
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
                include '../views/login.php';
            }
        } else {
            include '../views/login.php';
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
