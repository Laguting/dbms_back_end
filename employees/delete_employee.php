<?php
include 'db_connect.php';

if(isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];
    $stmt = $conn->prepare("DELETE FROM employees WHERE emp_id=?");
    $stmt->bind_param("s", $emp_id);
    if($stmt->execute()) {
        echo "Employee deleted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
