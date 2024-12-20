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
$password = $_POST['password'];

$query = "SELECT password, names FROM registration WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    $stored_name = $row['names'];

    if (password_verify($password, $hashed_password)) {
        // Setting session variables
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $stored_name;

        // Debugging
        error_log("Login successful. User name set: " . $_SESSION['user_name']);

        header("Location: ../index.html");
        exit();
    } else {
        header("Location: ../error.html");
        exit();
    }
} else {
    header("Location: ../error.html");
    exit();
}

mysqli_close($conn);
?>
