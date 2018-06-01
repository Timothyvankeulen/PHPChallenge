<?php
$servername = "localhost";
$username = "User";
$password = "Welkom01";
$dbname = "Challenge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Creating Table
$sql = "CREATE TABLE Playlist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
playlistname VARCHAR(30) NOT NULL,
url VARCHAR(128) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Playlist created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>