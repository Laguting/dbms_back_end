<?php
include "db_connect.php";

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];

$sql = "INSERT INTO book (isbn, title, author, selling_price)
        VALUES ('$isbn', '$title', '$author', '$price')";

if (mysqli_query($conn, $sql)) {
    echo "Book added successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>