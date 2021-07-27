<?php
include 'conf/db.php';
// sql to create table
$sql = "CREATE TABLE mooc (
mooc_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
mooc_emailid VARCHAR(50),
mooc_title VARCHAR(100),
mooc_url VARCHAR(100),
mooc_date date,
mooc_duration VARCHAR(50),
mooc_postdate date
)";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>