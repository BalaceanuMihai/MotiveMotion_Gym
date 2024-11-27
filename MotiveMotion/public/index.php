<?php

require_once 'config/routes.php'; // Adjust the path as necessary

// Start the session (optional, if using sessions)
session_start();

// Get the current URI
$uri = trim($_SERVER["REQUEST_URI"], "/");

echo $uri;

// Initialize the router and route the request
$router = new Router();
$router->direct($uri);
?>

<h1>Welcome to MotiveMotion!</h1>