<html>

<head>
</head>

<body>

<?php
$usn = $_POST['usn'];
$name = $_POST['name'];
$email = $_POST['email'];
$passwd = md5($_POST['pass']);
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$gender = (string)$gender;
$g = 1;
if (strcmp($gender,"Male"))
{	
	$g = 0;
}

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

	$sql="INSERT INTO users (usn, passwd, email, usertype, DOB, gender, phone) VALUES
	('$usn', '$passwd', '$email', 'user', '$dob', '$g', '$phone')";

	if (!mysqli_query($con,$sql))
	{
	  die('Error: ' . mysqli_error());
	}
	header("location:index.html");
}

mysqli_close($con);
?>

</body>

</html>