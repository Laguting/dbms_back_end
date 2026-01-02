<?php
include 'db_connect.php';

if(isset($_POST['pub_id'])) {
    $pub_id = $_POST['pub_id'];
    $pub_name = $_POST['pub_name'] ?? null;
    $city = $_POST['city'] ?? null;
    $state = $_POST['state'] ?? null;
    $country = $_POST['country'] ?? null;

    $stmt = $conn->prepare("UPDATE publishers SET pub_name=?, city=?, state=?, country=? WHERE pub_id=?");
    $stmt->bind_param("sssss", $pub_name, $city, $state, $country, $pub_id);
    if($stmt->execute()) {
        echo "Publisher updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
