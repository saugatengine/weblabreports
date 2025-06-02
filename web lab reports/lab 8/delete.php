<?php
include 'db.php';

$email = $_POST['email'];

$sql = "DELETE FROM students WHERE email='$email'";
if ($conn->query($sql)) {
    echo "Deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
