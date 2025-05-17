<?php

$host = 'localhost'; 
$user_db = 'root'; 
$pass_db = ''; 
$name_db = 'myrestaurant'; 

$conn = mysqli_connect($host, $user_db, $pass_db, $name_db);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 

$names = mysqli_real_escape_string($conn, $_POST['name']);
$surnames = mysqli_real_escape_string($conn, $_POST['surname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 


$query = "INSERT INTO registration (names, surnames, email, password) VALUES ('$names', '$surnames', '$email', '$password')";

if (mysqli_query($conn, $query)) {
    header("Location: login.html");
} else {
    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);
?>