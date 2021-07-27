<?php
include 'conf/db.php';
// sql to create table
$sql = "CREATE TABLE books (
book_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
book_emailid VARCHAR(100),
book_year VARCHAR(10),
book_authorship VARCHAR(100),
book_title VARCHAR(100),
book_journal_name VARCHAR(100),
book_postdate date
)";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>