<?php 
$servername = "localhost";
$username = "id15456401_binusaso";
$password = "ff7cqLN%L]&3\|T8";
$dbname = "id15456401_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>