<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Debug: Log the session data
error_log("Session data: " . print_r($_SESSION, true));

header('Content-Type: application/json');

if (isset($_SESSION['user_name'])) {
    $response = ['name' => $_SESSION['user_name']];
    error_log("Sending response: " . json_encode($response));
    echo json_encode($response);
} else {
    error_log("No user_name in session, sending Guest");
    echo json_encode(['name' => 'Guest']);
}
?>
 