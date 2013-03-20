<html>

<head>
</head>

<body>

<?php
session_start();
$_SESSION['is_logged_in'] = 0;
$username = $_POST['name'];
$password = $_POST['pass'];

$con=mysqli_connect("localhost","root","a","projects");

if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM users WHERE usn='$username' AND passwd='$password'");
if (mysqli_error())
{
   die(mysqli_error());
}

if(mysqli_num_rows($result) == 1)
{
	$_SESSION['is_logged_in'] = 1;
  	header("location:home.php");
}
else
{
	header("location:logout.php");
}
mysqli_close($con);
?>

</body>

</html>