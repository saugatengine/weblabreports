<?php
$host = "localhost";
$user = "student_1";
$password = "student55";
$dbname = "gadget hub";

$conn=new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
