<?php
include 'db.php';

$email = $_POST['email'];
$newName = $_POST['name'];

$sql = "UPDATE students SET name='$newName' WHERE email='$email'";
if ($conn->query($sql)) {
    echo "Updated successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
