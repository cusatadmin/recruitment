<?php
	include 'conf/db.php';

$result_set = $conn->query("SELECT * FROM countries ");// Generate resultset
$my_array=array();

while($row = $result_set->fetch_array(MYSQLI_ASSOC)){

$my_array[]=array("id"=>$row['id'],"country_code"=>$row['country_code'],"country_name"=>$row['country_name']);
}

$max=sizeof($my_array);

for($i=0; $i<$max; $i++) { 
// displaying all the elements
//while (list ($key, $val) = each ($my_array[$i])) { 
//echo "$key -> $val <br>"; 
echo $my_array[$i]['country_name']."<br>";
//} // inner array while loop

} // outer array for loop
for($i=0; $i<$max; $i++) { 
echo $my_array[$i]['country_name']."<br>";
} // 
?>