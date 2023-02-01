<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "la71";
$id = $_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>
<html>
<body>

<?php
$sql = "SELECT * FROM MyGuests Where id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
?>

<form action="updatedata.php" method="GET">
ID= <input type="text" name="id" value="<?php echo $row["id"];?>" ><br>
Firstname: <input type="text" name="firstname" value="<?php echo $row["firstname"];?>" ><br>
Lastname: <input type="text" name="lastname" value="<?php echo $row["lastname"];?>"><br>
Gender: <input type="text" name="gender" value="<?php echo $row["Gender"];?>"><br>
Tlp Rmh: <input type="text" name="tlprmh" value="<?php echo $row["tlprmh"];?>"><br>
HP:<input type="text" name="HP" value="<?php echo $row["HP"];?>"><br>
E-mail: <input type="text" name="email" value="<?php echo $row["email"];?>"s><br>
<input type="submit">
</form>

</body>
</html>
