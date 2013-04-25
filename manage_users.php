<html>

<head>
</head>

<body>

<?php
session_start();

$con=mysqli_connect("localhost","root","","projects");

if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM users");
if (mysqli_error($con))
{
   die(mysqli_error($con));
}

echo "<table border=\"2px\">";

while($row = mysqli_fetch_array($result))
{
	$usn = $row['usn'];
	$email = $row['email'];
	$phone = $row['phone'];
	
	echo "<tr>";
		echo "<td>";
			//$row['name'];
		echo "</td>";
		echo "<td>";
			echo $usn;
		echo "</td>";
		echo "<td>";
			echo $email;
		echo "</td>";
		echo "<td>";
			echo $phone;
		echo "</td>";
		echo "<td>";
			$del = 'delete_user.php?usn='.$usn;
			echo "<a href=$del><input type=\"button\" value=\"Delete\"></a>";
		echo "</td>";
	echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</body>
</html>