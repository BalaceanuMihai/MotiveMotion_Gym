<?php
require_once 'app/controllers/MembershipController.php';
require_once 'app/controllers/UserController.php';
require_once 'app/controllers/WorkoutPlanController.php';

$routes = [
    "MotiveMotion/memberships/index" => ["MembershipController", "index"],
    "MotiveMotion/users/index" => ["UserController", "index"],
    "MotiveMotion/workout_plans/index" => ["WorkoutPlanController", "index"],
];

class Router {
    private $uri;

    public function __construct() {
        // Get the current URI
        $this->uri = trim($_SERVER["REQUEST_URI"], "/");
    }

    public function direct() {
        global $routes;

        // Print the routes array for debugging
        echo "Routes Array: <pre>" . print_r($routes, true) . "</pre><br>";
        echo "Directing URI: " . htmlspecialchars($this->uri) . "<br>";

        if (array_key_exists($this->uri, $routes)) {
            // Get the controller and method
            [$controller, $method] = $routes[$this->uri];

            // Load the controller file if it hasn't been autoloaded
            require_once "app/controllers/{$controller}.php";

            // Call the method
            return $controller::$method();
        }

        // Handle the default route
        if ($this->uri === "MotiveMotion/index.php" || $this->uri === "MotiveMotion") {
            echo "Welcome to MotiveMotion!";
            return;
        }

        echo "404 Not Found for URI: " . htmlspecialchars($this->uri) . "<br>";
        require_once 'app/views/404.php';
    }
}
?>
