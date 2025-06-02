<?php
// include  'dbconnection.php';
$servername = "localhost";
$username = "gadget_store";         
$password = "gadget123";              
$dbname = "gadget_store_1";   // your DB name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email =trim($_POST['email']);
    $password =$_POST['password'];
     $check = $conn->prepare( "SELECT id FROM users WHERE email=?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();
if($check->num_rows >0){
echo ("already registered");
} else{
    $hashedpassword= password_hash(
    $password, PASSWORD_DEFAULT);
$start=$conn->prepare("INSERT INTO users (email,password) VALUES(?, ?)");
$start->bind_param("ss", $email, $hashedpassword);
if($start -> execute()){
    session_start();
    $username=$_SESSION['email'] = $email;
    echo ("registration successfull");
}
}
    }
?>