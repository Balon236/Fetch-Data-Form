<?php
// Database connection
$servername = "localhost"; // Change if necessary
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "your_database_name_will_go_here"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO your_table_name_here (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to display data
    header("Location: index.php?success=1");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>