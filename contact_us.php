<?php

$host = 'localhost';
$user_db = 'root';
$pass_db = '';
$name_db = 'myrestaurant';

$conn = mysqli_connect($host, $user_db, $pass_db, $name_db);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $names = mysqli_real_escape_string($conn, $_POST['cname']);
    $email = mysqli_real_escape_string($conn, $_POST['cemail']);
    $message = mysqli_real_escape_string($conn, $_POST['cmessage']);

    
    $query = "INSERT INTO contact_us (names, email, message) VALUES ('$names', '$email', '$message')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.html");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>