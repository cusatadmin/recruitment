<?php
include 'conf/db.php';
// sql to create table
$sql = "CREATE TABLE profile (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(100),
countrycode VARCHAR(50),
nationality VARCHAR(50),
dateofbirth TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
gender VARCHAR(20),
mobile VARCHAR(30),
category VARCHAR(10),
pwd VARCHAR(20),
marital VARCHAR(20),
guardianname VARCHAR(100),
postaladd1 VARCHAR(100),
postaladd2 VARCHAR(100),
postalcity VARCHAR(100),
postalstate VARCHAR(100),
postalpin VARCHAR(100),
postalcountry VARCHAR(100),
permanentadd1 VARCHAR(100),
permanentadd2 VARCHAR(100),
permanentcity VARCHAR(100),
permanentstate VARCHAR(100),
permanentpin VARCHAR(100),
permanentcountry VARCHAR(100)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>