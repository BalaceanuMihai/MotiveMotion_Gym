<?php

require_once 'app/controllers/UserController.php';
require_once 'app/controllers/WorkoutPlanController.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/ImportController.php';
require_once 'app/controllers/ExportController.php';
require_once 'app/controllers/AnalyticsController.php'; // Include AnalyticsController

$routes = [
    "MotiveMotion/memberships/index" => ["MembershipController", "index"],
    "MotiveMotion/users/index" => ["UserController", "index"],
    "MotiveMotion/workout_plans/index" => ["WorkoutPlanController", "index"],
    "MotiveMotion/auth/login" => ["AuthController", "showLoginForm"],
    "MotiveMotion/auth/register" => ["AuthController", "showRegisterForm"],
    "MotiveMotion/auth/storeLogin" => ["AuthController", "login"],
    "MotiveMotion/auth/storeRegister" => ["AuthController", "register"],
    "MotiveMotion/auth/logout" => ["AuthController", "logout"],
    "MotiveMotion/memberships/create" => ["MembershipController", "create"],
    "MotiveMotion/memberships/store" => ["MembershipController", "store"],
    "MotiveMotion/memberships/edit/{id}" => ["MembershipController", "edit"],
    "MotiveMotion/memberships/update/{id}" => ["MembershipController", "update"],
    "MotiveMotion/memberships/destroy/{id}" => ["MembershipController", "destroy"],
    "MotiveMotion/memberships/show/{id}" => ["MembershipController", "show"],
    "MotiveMotion/memberships/home_user" => ["MembershipController", "home_user"],
    "MotiveMotion/import/excel" => ["ImportController", "importExcel"],
    "MotiveMotion/import/pdf" => ["ImportController", "importPDF"],
    "MotiveMotion/import/word" => ["ImportController", "importWord"],
    "MotiveMotion/export/excel" => ["ExportController", "exportExcel"],
    "MotiveMotion/export/pdf" => ["ExportController", "exportPDF"],
    "MotiveMotion/export/word" => ["ExportController", "exportWord"],
    "MotiveMotion/export/qr_code" => ["ExportController", "exportQR"],
    "MotiveMotion/view/export/excel" => ["ExportController", "showExportExcel"],
    "MotiveMotion/view/export/pdf" => ["ExportController", "showExportPDF"],
    "MotiveMotion/view/export/word" => ["ExportController", "showExportWord"],
    "MotiveMotion/view/export/qr_code" => ["ExportController", "showExportQR"],
    "MotiveMotion/analytics" => ["AnalyticsController", "showAnalytics"], // Adaugă ruta pentru Analytics
    "MotiveMotion/proteinintake/{userId}/{weight}" => ["ProteinIntakeController", "showProteinIntake"], // Adaugă ruta pentru proteinIntake
];

class Router {
    private $uri;

    public function __construct() {
        // Get the current URI
        $this->uri = trim($_SERVER["REQUEST_URI"], "/");
    }

    public function direct() {
        global $routes;

        // // Print the routes array for debugging
        // echo "Routes Array: <pre>" . print_r($routes, true) . "</pre><br>";
        // echo "Directing URI: " . htmlspecialchars($this->uri) . "<br>";

        foreach ($routes as $route => $controllerAction) {
            // Convert route pattern to a regular expression
            $routePattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);
            if (preg_match("#^$routePattern$#", $this->uri, $matches)) {
                list($controller, $method) = $controllerAction;
                require_once "app/controllers/{$controller}.php";
                array_shift($matches); // Remove the full match
                // echo "Calling $controller::$method with parameters: " . implode(", ", $matches) . "<br>";
                return call_user_func_array([$controller, $method], $matches);
            }
        }

        // Handle the default route
        if ($this->uri === "MotiveMotion/index.php" || $this->uri === "MotiveMotion") {
            // echo "Welcome to MotiveMotion!";
            return;
        }

        // echo "404 Not Found for URI: " . htmlspecialchars($this->uri) . "<br>";
        require_once 'app/views/404.php';
    }
}
?>