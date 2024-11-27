<?php
require_once "app/models/User.php";

class AuthController {
    public static function showLoginForm() {
        require_once "app/views/auth/login.php";
    }

    public static function login() {
        // Print the request method for debugging
        echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Print the $_POST array for debugging
            echo "POST Data: <pre>" . print_r($_POST, true) . "</pre><br>";

            // Check if the keys are set
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];


                // Start the session and set session variables
                session_start();
                $_SESSION['email'] = $email;

                // Redirect to the index.php page
                header("Location: /MotiveMotion/index.php");
                exit();
            } else {
                echo "Error: Missing form data<br>";
            }
        } else {
            echo "Error: Invalid request method<br>";
        }
    }   

    public static function logout() {
        session_start();
        session_destroy();
        header("Location: /MotiveMotion/auth/login");
        exit();
    }

    public static function showRegisterForm() {
        require_once "app/views/auth/register.php";
    }

    public static function register() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Print the $_POST array for debugging
            echo "POST Data: <pre>" . print_r($_POST, true) . "</pre><br>";

            // Check if the keys are set
            if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role_id'])) {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $role_id = $_POST['role_id'];

                // Create a new user using the createUser function
                if (User::createUser($first_name, $last_name, $email, $password, $role_id)) {
                    echo "Registration successful for: " . htmlspecialchars($first_name) . " " . htmlspecialchars($last_name) . "<br>";
                    header("Location: /MotiveMotion/auth/login");
                    exit();
                } else {
                    echo "Error: Failed to save user<br>";
                }
            } else {
                echo "Error: Missing form data<br>";
            }
        } else {
            echo "Error: Invalid request method<br>";
        }
    }
}
?>
