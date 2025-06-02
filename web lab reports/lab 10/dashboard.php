<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: login.html");
    exit();
}
echo "<h2>Welcome to your dashboard, User ID: " . $_SESSION['userid'] . "</h2>";
?>
