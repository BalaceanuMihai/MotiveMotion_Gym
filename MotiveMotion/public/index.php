<?php

require_once 'vendor/autoload.php'; // Include autoload.php generat de Composer
require_once 'config/routes.php'; // Adjust the path as necessary
require_once 'app/controllers/AnalyticsController.php'; // Include the AnalyticsController

// Start the session (optional, if using sessions)
session_start();

// Colectează datele de analiză
AnalyticsController::collectData();

// Get the current URI
$uri = trim($_SERVER["REQUEST_URI"], "/");

// Initialize the router and route the request
$router = new Router();
$router->direct($uri);
?>

<h1>Welcome to MotiveMotion!</h1>