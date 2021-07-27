<?php
	session_start();

 include 'conf/db.php';
 
 /*
$request = mysqli_real_escape_string($conn, $_POST["query"]);
$query = "SELECT * FROM postnames WHERE name LIKE '%".$request."%'";
$result = mysqli_query($conn, $query);
$data = array();
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["name"];
 }
 echo json_encode($data);
}
*/

	
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";

	$sql = $conn->prepare("SELECT * FROM postnames WHERE name LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["name"];
		}
		echo json_encode($countryResult);
	}
	$conn->close();


?>



