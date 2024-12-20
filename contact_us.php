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
    // Sanitize and get POST data
    $names = mysqli_real_escape_string($conn, $_POST['cname']);
    $address = mysqli_real_escape_string($conn, $_POST['caddress']);
    $email = mysqli_real_escape_string($conn, $_POST['cemail']);
    $message = mysqli_real_escape_string($conn, $_POST['cmessage']);
    $price = mysqli_real_escape_string($conn, $_POST['total_price']); // Get the total price
    $itemCount = mysqli_real_escape_string($conn, $_POST['item_count']); // Get the item count

    // Insert data into contact_us table
    $query = "INSERT INTO contact_us (names, email, message, address, price, item_count) 
              VALUES ('$names', '$email', '$message', '$address', '$price', '$itemCount')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.html");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
