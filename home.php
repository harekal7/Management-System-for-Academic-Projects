<html>

<head>
</head>

<body>
<?php
echo "<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Management System for Academic Projects</h2><br><br>";
session_start();
if ($_SESSION['is_logged_in'] == 0 )
{
    header("Location:index.php");
    die();
}

$con=mysqli_connect("localhost","root","a","projects");

if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project");
if (mysqli_error())
{
   die(mysqli_error());
}


while($row = mysqli_fetch_array($result))
{
  $name = $row['Name'];
  $path = "http://localhost/SE/second.php?id=".$row['id']."";
  
  echo "<a href=$path>$name</a>";
  echo "<br />";
  echo $row['info'];
  echo "<br />";echo "<br />";echo "<br />";
}

mysqli_close($con);
?>
</body>

</html>