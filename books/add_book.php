<?php
include 'db_connect.php';

if(isset($_POST['title_id'], $_POST['title'], $_POST['pub_id'], $_POST['au_id'])) {
    $title_id = $_POST['title_id'];
    $title = $_POST['title'];
    $pub_id = $_POST['pub_id'];
    $price = $_POST['price'] ?? 0;

    // Add book to titles table
    $stmt = $conn->prepare("INSERT INTO titles (title_id, title, pub_id, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $title_id, $title, $pub_id, $price);
    if($stmt->execute()) {
        // Link author to book
        $au_id = $_POST['au_id'];
        $stmt2 = $conn->prepare("INSERT INTO titleauthor (au_id, title_id) VALUES (?, ?)");
        $stmt2->bind_param("ss", $au_id, $title_id);
        $stmt2->execute();
        $stmt2->close();
        echo "Book added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
