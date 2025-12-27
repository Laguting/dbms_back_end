<?php
$host = "localhost";
$user = "root";
$password = "";   // NOT empty
$database = "ink_and_solace";
$port = 3307;

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>