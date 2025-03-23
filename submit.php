<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "customer"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$sql = "INSERT INTO pets (name, address, phone, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $name, $address, $phone, $message);

if ($stmt->execute()) {
    header("Location: received.html");
    // echo "your request has been received we will contact you when we find a suitable pet for you";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
