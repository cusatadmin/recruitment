<?php
include 'conf/db.php';
// sql to create table
$sql = "CREATE TABLE academic (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tenth_board VARCHAR(200),
tenth_subject VARCHAR(100),
tenthResultType VARCHAR(50),
dateofbirth TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
tempTenthPercentage VARCHAR(20),
tenth_year VARCHAR(30),
tenth_school VARCHAR(10),
twelfth_board VARCHAR(200),
twelfth_subject VARCHAR(100),
twelfthResultType VARCHAR(50),
tempTwelthPercentage VARCHAR(20),
twelfth_year VARCHAR(30),
qualification VARCHAR(10),
stream VARCHAR(100),
ugcollege VARCHAR(100),
ugsubject VARCHAR(100),
ugpercentage VARCHAR(100),
ugyear VARCHAR(100),
uguniversity VARCHAR(100),
pgcollege VARCHAR(10),
pgsubject VARCHAR(100),
pgpercentage VARCHAR(100),
pgyear VARCHAR(100),
pguniversity VARCHAR(100),
mphilna VARCHAR(100),
phdna VARCHAR(100),
Academic_oTitle VARCHAR(200),
academic_odatesub VARCHAR(200),
Academic_oDetails VARCHAR(200),
net VARCHAR(200),
netsubject VARCHAR(200),
netcertificateno VARCHAR(200)


)";

if ($conn->query($sql) === TRUE) {
  echo "Table academic created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>