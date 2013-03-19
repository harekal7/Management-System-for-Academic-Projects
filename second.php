<html>

<head>
</head>

<body>
<?php
session_start();
echo "<a href='logout.php'>Log Out</a>";
echo "<br><br>";
if ($_SESSION['is_logged_in'] == 0 )
{
    header("Location:index.php");
    die();
}
$id = $_GET['id'];

$con=mysqli_connect("localhost","root","a","projects");

if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project WHERE id=$id");
$row = mysqli_fetch_array($result);
echo "Project Name : ";
echo $row['Name'];
echo "<br>";echo "<br>";
echo "Author : ";
echo $row['author'];
echo "<br>";echo "<br>";
echo "Guided By : Prof. ";
echo $row['guide'];
echo "<br>";echo "<br>";
echo "INFO : ";
echo $row['info'];
echo "<br>";echo "<br>";
echo "Year : ";
echo $row['year'];
echo "<br>";echo "<br>";
echo "Programming Language : ";
echo $row['PL'];
echo "<br>";echo "<br>";
echo "Domain : ";
echo $row['domain'];
mysqli_close($con);
?>
</body>

</html>