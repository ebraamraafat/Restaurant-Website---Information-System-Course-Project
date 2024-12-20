<?php
header('Content-Type: application/json');
session_start();

if (isset($_SESSION['user_name'])) {
    echo json_encode(['name' => $_SESSION['user_name']]);
    error_log("Session user_name exists: " . $_SESSION['user_name']); // Debugging
} else {
    echo json_encode(['name' => null]);
    error_log("No session user_name found."); // Debugging
}
?>
