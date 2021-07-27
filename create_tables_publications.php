<?php
include 'conf/db.php';
// sql to create table
$sql = "CREATE TABLE publications (
publication_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
publication_emailid VARCHAR(100),
publication_type VARCHAR(50),
publication_year VARCHAR(10),
publication_issn_no VARCHAR(50),
publication_authorship VARCHAR(100),
publication_title VARCHAR(100),
publication_volume_no VARCHAR(50),
publication_impact_factor VARCHAR(50),
publication_page_no VARCHAR(20),
publication_scopus_indexed VARCHAR(50),
publication_journal_name VARCHAR(100),
publication_postdate date
)";

if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>