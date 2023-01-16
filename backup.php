<?php
include "config.php";

// Get connection credentials from environment variables
$hostname = getenv("hostname");
$username = getenv("username");
$password = getenv("password");
$database = getenv("database_name");

// Connect to the database
$conn = mysqli_connect($hostname,$username,$password,$database);

// Define the filename for the backup
$backup_file = "railway.sql";

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * INTO OUTFILE '$backup_file' FROM railway";

// Execute the query
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Backup of 'railway' completed!";
} else {
    echo "Error creating backup: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
