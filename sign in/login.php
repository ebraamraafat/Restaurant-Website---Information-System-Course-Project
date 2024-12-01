<?php

session_start();

$host = 'localhost';
$user_db = 'root';
$pass_db = '';
$name_db = 'myrestaurant';

$conn = mysqli_connect($host, $user_db, $pass_db, $name_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password']; // Get the plain text password

// Query to retrieve the hashed password and the user's name for the given email
$query = "SELECT password, names FROM registration WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    $stored_name = $row['names']; // Retrieve the user's name

    // Verify the entered password against the hashed password
    if (password_verify($password, $hashed_password)) {
        // Password is correct, proceed with login
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $stored_name; // Store the user's name in session
        header("Location: ../index.html");
        exit();
    } else {
        // Invalid password
        header("Location: ../error.html");
        exit();
    }
} else {
    // Email not found
    header("Location: ../error.html");
    exit();
}

mysqli_close($conn);

?>