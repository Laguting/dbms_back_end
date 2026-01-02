<?php
include 'db_connect.php';

if(isset($_POST['au_id'])) {
    $au_id = $_POST['au_id'];
    $stmt = $conn->prepare("DELETE FROM authors WHERE au_id=?");
    $stmt->bind_param("s", $au_id);
    if($stmt->execute()) {
        echo "Author deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
