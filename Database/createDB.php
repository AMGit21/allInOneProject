<?php
require_once('config.php');

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS marketplace";
$conn->query($sql);
// if ($conn->query($sql) === TRUE) {
//     echo "Database marketplace created successfully or founded<br>";
// } else {
//     echo "Error creating database: " . $conn->error;
// }
