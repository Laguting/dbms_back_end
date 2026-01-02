<?php
include 'db_connect.php';

if(isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'] ?? null;
    $pub_id = $_POST['pub_id'] ?? null;
    $position = $_POST['position'] ?? null;
    $email = $_POST['email'] ?? null;

    $stmt = $conn->prepare("UPDATE employees SET emp_name=?, pub_id=?, position=?, email=? WHERE emp_id=?");
    $stmt->bind_param("sssss", $emp_name, $pub_id, $position, $email, $emp_id);
    if($stmt->execute()) {
        echo "Employee updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
