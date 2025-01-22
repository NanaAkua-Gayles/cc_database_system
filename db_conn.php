<?php
$servername = "localhost";
$username = "root";  // Default username for XAMPP
$password = "";      // Default password is usually empty for XAMPP
$dbname = "membership_registration_system"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>