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
$password = sha1($_POST['password']); 


$query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    
    
    $_SESSION['email'] = $email; 
    header("Location: ../error.html");    
    exit(); 
} else {
    header("Location: ../index.html");
}



mysqli_close($conn);
?>