<?php
include 'config.php';

if(isset($_POST['title_id'])) {
    $title_id = $_POST['title_id'];
    // Remove from titleauthor first to avoid foreign key issues
    $stmt = $conn->prepare("DELETE FROM titleauthor WHERE title_id=?");
    $stmt->bind_param("s", $title_id);
    $stmt->execute();
    $stmt->close();

    // Delete book
    $stmt2 = $conn->prepare("DELETE FROM titles WHERE title_id=?");
    $stmt2->bind_param("s", $title_id);
    if($stmt2->execute()) {
        echo "Book deleted successfully.";
    } else {
        echo "Error: " . $stmt2->error;
    }
    $stmt2->close();
}
$conn->close();
?>
