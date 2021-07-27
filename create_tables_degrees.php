<?php
include 'conf/db.php';
// sql to create table
$sql = "CREATE TABLE degrees (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
degree VARCHAR(100)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>