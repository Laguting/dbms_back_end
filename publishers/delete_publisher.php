<?php
include 'db_connect.php';

if(isset($_POST['pub_id'])) {
    $pub_id = $_POST['pub_id'];

    // Delete related books first to avoid foreign key errors
    $stmt1 = $conn->prepare("DELETE FROM titleauthor WHERE title_id IN (SELECT title_id FROM titles WHERE pub_id=?)");
    $stmt1->bind_param("s", $pub_id);
    $stmt1->execute();
    $stmt1->close();

    $stmt2 = $conn->prepare("DELETE FROM titles WHERE pub_id=?");
    $stmt2->bind_param("s", $pub_id);
    $stmt2->execute();
    $stmt2->close();

    // Delete publisher
    $stmt = $conn->prepare("DELETE FROM publishers WHERE pub_id=?");
    $stmt->bind_param("s", $pub_id);
    if($stmt->execute()) {
        echo "Publisher deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
