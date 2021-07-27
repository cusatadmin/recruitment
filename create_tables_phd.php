<?php
include 'conf/db.php';
// sql to create table
$sql = "CREATE TABLE phd (
phd_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
phd_emailid VARCHAR(100),
phd_category VARCHAR(50),
phd_subject VARCHAR(50),
phd_title VARCHAR(150),
phd_companion VARCHAR(100),
phd_award_date date,
phd_registration_date date,
phd_publications VARCHAR(200),
phd_postdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>