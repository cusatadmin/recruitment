<?php
include 'conf/db.php';
// sql to create table
$sql = "CREATE TABLE experience (
exp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exp_emailid VARCHAR(100),
exp_category VARCHAR(50),
exp_designation VARCHAR(100),
exp_from_date date,
exp_to_date date,
exp_employer VARCHAR(100),
exp_postdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>