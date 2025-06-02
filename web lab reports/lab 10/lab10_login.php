<?php
session_start();

$servername = "localhost";
$username = "gadget_store";         
$password = "gadget123";              
$dbname = "gadget_store_1";   // your DB name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id,email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $email, $hashed_password);
        $stmt->fetch();
        
        if (password_verify($pass, $hashed_password)) {
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $name = strtok($email, '@');
            echo "wlcome $name!
     
     </div>";
            // header("Location: dashboard.php"); // Optional redirect
        } else {
            echo " wrong password ";
        }
    } else {
        echo "not found in server";
    }

    $stmt->close();
}
$conn->close();
?>
