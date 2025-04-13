<?php
function registerUser($name, $email, $title, $description) {
    $conn = new mysqli('localhost', 'root', '', 'test');

    if ($conn->connect_error) {
        return 'Connection Failed: ' . $conn->connect_error;
    }

    $stmt = $conn->prepare("INSERT INTO registration (name, email, title, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $title, $description);

    $response = $stmt->execute() ? "Registration successful!" : "Error: " . $stmt->error;

    $stmt->close();
    $conn->close();
    return $response;
}

// Call function
echo registerUser($_POST['name'], $_POST['email'], $_POST['title'], $_POST['description']);
?>
