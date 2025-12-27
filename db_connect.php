<?php
$host = "localhost";
$user = "root";
$password = "YOUR_PASSWORD";   // NOT empty
$database = "ink_and_solace";
$port = 3306;

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>