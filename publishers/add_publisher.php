<?php
include 'db_connect.php';

if(isset($_POST['pub_id'], $_POST['pub_name'])) {
    $pub_id = $_POST['pub_id'];
    $pub_name = $_POST['pub_name'];
    $city = $_POST['city'] ?? null;
    $state = $_POST['state'] ?? null;
    $country = $_POST['country'] ?? null;

    $stmt = $conn->prepare("INSERT INTO publishers (pub_id, pub_name, city, state, country) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $pub_id, $pub_name, $city, $state, $country);
    if($stmt->execute()) {
        echo "Publisher added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
