<?php
include 'db_connect.php';

if(isset($_POST['au_id'], $_POST['au_fname'], $_POST['au_lname'])) {
    $au_id = $_POST['au_id'];
    $au_fname = $_POST['au_fname'];
    $au_lname = $_POST['au_lname'];
    $city = $_POST['city'] ?? null;
    $state = $_POST['state'] ?? null;

    $stmt = $conn->prepare("INSERT INTO authors (au_id, au_fname, au_lname, city, state) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $au_id, $au_fname, $au_lname, $city, $state);
    if($stmt->execute()) {
        echo "Author added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
