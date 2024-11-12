<?php
$routes = [
    "MotiveMotion/memberships/index" => ["DebtController", "index"],
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
   
        if (array_key_exists($this->uri, $routes)) {

            // Get the controller and method
            [$controller, $method] = $routes[$this->uri];

            // Load the controller file if it hasn't been autoloaded
            require_once "app/controllers/{$controller}.php";

            // Call the method
            return $controller::$method();
        }
        
        require_once "app/views/404.php";
    }
}

?>