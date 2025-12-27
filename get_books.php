<?php
include "db_connect.php";

$query = "SELECT * FROM book";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "ISBN: " . $row['isbn'] . "<br>";
    echo "Title: " . $row['title'] . "<br>";
    echo "Author: " . $row['author'] . "<hr>";
}
?>