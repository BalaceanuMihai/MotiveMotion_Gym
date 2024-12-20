<?php
require_once "app/models/User.php";

class AuthController {
    public static function showLoginForm() {
        require_once "app/views/auth/login.php";
    }

    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = User::authenticate($email, $password);

            if ($user) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user'] = $user;

                // Redirect based on role_id
                if ($user['role_id'] == 1) {
                    header("Location: /MotiveMotion/memberships/index");
                } else if ($user['role_id'] == 2) {
                    header("Location: /MotiveMotion/workout_plans/index");
                } else if ($user['role_id'] == 3) {
                    header("Location: /MotiveMotion/memberships/home_user");
                } else {
                    header("Location: /MotiveMotion/index.php");
                }
                exit();
            } else {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['error'] = "Invalid email or password.";
                header("Location: /MotiveMotion/auth/login");
                exit();
            }
        }
    }

    public static function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: /MotiveMotion/auth/login");
        exit();
    }

    public static function showRegisterForm() {
        require_once "app/views/auth/register.php";
    }
}
?>