<html>

<head>
</head>

<body>

<?php
$usn = $_POST['usn'];
echo $usn;
$passwd = md5($_POST['pass']);
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];

$con=mysqli_connect("localhost","root","a","projects");

if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM users WHERE usn='$usn'");

if (mysqli_error())
{
   die(mysqli_error());
}

if(mysqli_num_rows($result) == 1)
{
  	header("location:logout.php");
}
else
{
	echo mysqli_num_rows($result);
	echo 'Updating Database';
	//update DB;
}
mysqli_close($con);
?>

</body>

</html>