<html>

<head>
</head>

<body>

<?php
session_start();
if ($_SESSION['is_logged_in'] == 0 )
{
    header("Location:index.php");
    die();
}
$username = $_SESSION['name'];
$ta = $_POST['ta'];

$id = $_GET['id'];

echo $username." has requested for project number ".$id;

$con=mysqli_connect("localhost","root","","projects");

if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$sql="INSERT INTO request (name, id, ta)
	  VALUES ('$username', '$id', '$ta')";
if (!mysqli_query($con,$sql))
{
	die('Error: ' . mysqli_error($con));
}
else
{
	echo "Request Submitted";
}


?>
</body>



</html>