<html>

<head>
	<title>Portal</title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<link href="../css/student.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Nova+Square' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="container">
<?php
session_start();
if ($_SESSION['is_logged_in'] == 0 )
{
    header("Location:index.php");
    die();
}
echo "<a href='logout.php'>Log Out</a>";
echo "<br><br>";
$id = $_GET['id'];

$con=mysqli_connect("localhost","root","","projects");

if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project WHERE id=$id");
$row = mysqli_fetch_array($result);

echo "Project Name : ";
echo $row['Name'];
echo "<br><br>";

echo "Author : ";
echo $row['author'];
echo "<br>";echo "<br>";

echo "Guided By : Prof. ";
echo $row['guide'];
echo "<br>";echo "<br>";

echo "Abstract : ";
$file=fopen("info".$id.".txt","r") or exit("Unable to open file!");
while(!feof($file))
{
  echo fgets($file). "<br>";
}
fclose($file);
echo "<br>";echo "<br>";

echo "Year : ";
echo $row['year'];
echo "<br>";echo "<br>";

echo "Programming Language : ";
echo $row['PL'];
echo "<br>";echo "<br>";

echo "Domain : ";
echo $row['domain'];
echo "<br>";echo "<br>";

echo "Project Status : ";
if ($row['status'] == 0)
	echo "Not Completed";
else
	echo "Completed";
echo "<br>";echo "<br>";

$path = "request.php?id=".$id."";
echo "<a href=$path>Request for source code</a>";

mysqli_close($con);
?>
<div>
</body>

</html>