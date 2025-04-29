<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "users_db";
$port = 3307;

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Don't close the connection here!
?>
