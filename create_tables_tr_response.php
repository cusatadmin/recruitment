<?php
include 'conf/db.php';
// sql to create response table
$sql = "CREATE TABLE tr_response (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
tr_ref_number INT UNSIGNED,
order_id VARCHAR(50),
amount VARCHAR(20),
status_code VARCHAR(5),
status_description VARCHAR(100),
rrn VARCHAR(30),
auth_code VARCHAR(10),
response_code VARCHAR(5),
tr_date VARCHAR(30),
addl_field1 VARCHAR(100),
addl_field2 VARCHAR(100),
addl_field3 VARCHAR(100),
addl_field4 VARCHAR(100),
addl_field5 VARCHAR(100),
postdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table tr_response created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// sql to create tr_cancel_request table
$sql = "CREATE TABLE tr_cancel (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
merchant_id VARCHAR(50),
order_id VARCHAR(50),
tr_ref_number INT UNSIGNED,
status_code VARCHAR(5),
status_description VARCHAR(100),
addl_field1 VARCHAR(100),
addl_field2 VARCHAR(100),
addl_field3 VARCHAR(100),
addl_field4 VARCHAR(100),
addl_field5 VARCHAR(100),
postdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table tr_cancel created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}



// sql to create tr_refund_request table
$sql = "CREATE TABLE tr_refund (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
merchant_id VARCHAR(50),
order_id VARCHAR(50),
tr_ref_number INT UNSIGNED,
amount VARCHAR(20),
status_code VARCHAR(5),
status_description VARCHAR(100),
addl_field1 VARCHAR(100),
addl_field2 VARCHAR(100),
addl_field3 VARCHAR(100),
addl_field4 VARCHAR(100),
addl_field5 VARCHAR(100),
postdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table tr_refund created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>