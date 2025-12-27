<?php
$host = "localhost";
$user = "root";
$password = ""; // default XAMPP
$database = "ink_and_solace";
$port = 3307;

// Connect to database
$conn = mysqli_connect($host, $user, $password, $database, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Database connected successfully!";
}
?>
