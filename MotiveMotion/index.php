<?php
require_once "config/routes.php";
require_once "config/pdo.php"; 

// Start the session (optional, if using sessions)
session_start();

// Get the current URI
$uri = trim($_SERVER["REQUEST_URI"], "/");

// Initialize the router and route the request
$router = new Router();
$router->direct();
?>

<h1>Welcome to MotiveMotion!</h1>