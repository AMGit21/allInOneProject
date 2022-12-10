<?php

require_once('createDB.php');
$dbname = "marketplace";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS loginusers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(30) NOT NULL,
    pass longtext NOT NULL,
    roles INT(1) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$conn->query($sql);
// if ($conn->query($sql) === TRUE) {
//     echo "Table LoginUsers created successfully or founded<br>";
// } else {
//     echo "Error creating table: " . $conn->error;
// }
    
// mysqli_close($conn);
