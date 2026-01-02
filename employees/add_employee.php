<?php
include 'db_connectphp';

if(isset($_POST['emp_id'], $_POST['emp_name'], $_POST['pub_id'])) {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $pub_id = $_POST['pub_id'];
    $position = $_POST['position'] ?? null;
    $email = $_POST['email'] ?? null;

    $stmt = $conn->prepare("INSERT INTO employees (emp_id, emp_name, pub_id, position, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $emp_id, $emp_name, $pub_id, $position, $email);
    if($stmt->execute()) {
        echo "Employee added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
