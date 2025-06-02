<?php
include 'db.php';

$result = $conn->query("SELECT * FROM students");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']} | Name: {$row['name']} | Email: {$row['email']}<br>";
    }
} else {
    echo "No records found.";
}

$conn->close();
?>
