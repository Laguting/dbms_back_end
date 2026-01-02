<?php
include 'db_connect.php';

if(isset($_POST['title_id'])) {
    $title_id = $_POST['title_id'];
    $title = $_POST['title'] ?? null;
    $pub_id = $_POST['pub_id'] ?? null;
    $price = $_POST['price'] ?? null;

    $stmt = $conn->prepare("UPDATE titles SET title=?, pub_id=?, price=? WHERE title_id=?");
    $stmt->bind_param("ssds", $title, $pub_id, $price, $title_id);
    if($stmt->execute()) {
        echo "Book updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
