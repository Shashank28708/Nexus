<?php
$name = $_POST['name'];
$email = $_POST['email'];
$title = $_POST['title'];
$description = $_POST['description'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (name, email, title, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $title, $description);
    
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
