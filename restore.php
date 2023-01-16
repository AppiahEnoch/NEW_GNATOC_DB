<?php
include "config.php";

// Get connection credentials from environment variables
$hostname = getenv("hostname");
$username = getenv("username");
$password = getenv("password");
$database = getenv("database_name");

// Connect to the database
$conn = mysqli_connect($hostname, $username, $password);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, $database);

// Define the path of the backup file
$backup_file = "path/to/backup/file.sql";

// Read the file content
$file = file_get_contents($backup_file);

// Execute the SQL commands
$result = mysqli_multi_query($conn, $file);

if ($result) {
    echo "Restore of '{$database}' completed!";
} else {
    echo "Error restoring the backup: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
