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
    $number = mysqli_real_escape_string($conn, $_POST['cnum']);

    
    // Get and sanitize price and item count
    $price = floatval($_POST['total_price']); // Convert to float
    $itemCount = intval($_POST['item_count']); // Convert to integer

    // Insert data into contact_us table
    $query = "INSERT INTO contact_us (names, email, message, address, price, item_count ,phone) 
              VALUES ('$names', '$email', '$message', '$address', $price, $itemCount ,$number)";

    if (mysqli_query($conn, $query)) {
        // Clear the cart after successful submission
        echo "<script>
            localStorage.removeItem('cart');
            window.location.href = 'index.html';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
