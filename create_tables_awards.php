<?php
include 'conf/db.php';
// sql to create table
$sql = "CREATE TABLE awards (
award_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
award_emailid VARCHAR(50),
award_body VARCHAR(100),
award_name VARCHAR(100),
award_date date,
award_level VARCHAR(50),
award_postdate date
)";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>