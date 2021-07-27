<?php
define('DB_SERVER', "10.0.31.12");
define('DB_USER', "faculty");
define('DB_PASSWORD', "db##Qsat");
define('DB_TABLE', "faculty");
define("THIS_YEAR",date("Y"));

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);

if ($conn->connect_error) {
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

?>