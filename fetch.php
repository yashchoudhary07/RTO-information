
<!DOCTYPE html>
<html>
<head>
	<title>Fetch Selected Data Example</title>
  <link rel="stylesheet" type="text/css" href="fetch.css">
  <style>
  *{
    margin: 0;
    padding: 0;


}
body{
    background:#B7B7B7;
    
 color: white;
}
</style>

</head>
<body>
	<h1>Vehicle information</h1>
	<form method="post" action="fetch.php">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name"><br><br>
		<label for="gender">Gender:</label>
		<input type="text" name="gender" id="gender"><br><br>
		<input type="submit" value="get data">
	</form>
</body>
</html>

<?php
 $result = 0;
if(isset($_POST['name'])){
   
// Connect to MySQL server
    $server = "localhost";
    $username = "root";
    $password = "";

$conn = mysqli_connect($server, $username, $password, 'rto form');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from table based on user input
$name = $_POST['name'];
$gender = $_POST['gender'];
$sql = "SELECT * FROM form WHERE name='$name'AND gender='$gender'";
$result = mysqli_query($conn, $sql);

// Display data as HTML table
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>Name</th><th>Gender</th><th>Phone</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["serial no"] . "</td><td>" . $row["name"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["phone"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No data found.";
}

// Close connection
mysqli_close($conn);
}
?>
