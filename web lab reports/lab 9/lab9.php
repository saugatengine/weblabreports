<?php
$servername = "localhost";
$username = "gadget_store_2";         // Replace with your DB username
$password = "gadget123";             // Replace with your DB password
$dbname = "gadget_store_2";   // Replace with your actual DB name
  
// Create connection
$conn=new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user=trim($_POST['username']);
    $email=trim($_POST['email']);

    // Server-side validation
    if (empty($user) || empty($email)) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Prepare and execute insert query
    $stmt=$conn->prepare("INSERT INTO users_1 (username, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $email);

    if ($stmt->execute()) {
        echo "Boom! Data successfully launched into the database. <br>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Show all records
    echo "<h3>Current Users:</h3>";
    $result=$conn->query("SELECT * FROM users_1");
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th></tr>";
        while ($row=$result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['email']}</td></tr>";
        }
        echo "</table>";
    }

    $stmt->close();
}
$conn->close();
?>
