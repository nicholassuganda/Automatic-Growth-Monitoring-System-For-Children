<!DOCTYPE html>

<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}


//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'id15456401_binusaso');
define('DB_PASSWORD', 'Ds[s5<2Hi{#?4<8?');
define('DB_NAME', 'id15456401_project');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}


//query to get data from the table
$query = sprintf("SELECT id, Tinggi FROM Sensor ORDER BY id");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);

?>
