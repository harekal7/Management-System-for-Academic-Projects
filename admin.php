<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>

    <title>Portal</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<?php
session_start();
if ($_SESSION['is_logged_in'] == 0 )
{
    header("Location:index.html");
    die();
}

echo '<a href="logout.php">Log Out</a>';
echo '<br>';

echo '<form action="search.php" method="post">
<input type="text" name="search" id="search">
<input type="submit" name="submit" id="submit" value="Search">
';

echo "<br><br>";
echo "<br><br>";

$con=mysqli_connect("localhost","root","","projects");

if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project WHERE review='0'");
if (mysqli_error($con))
{
   die(mysqli_error($con));
}

$i = 1;

while(($row = mysqli_fetch_array($result)) && ($i<4) )
{
  $name = $row['Name'];
  $path = "http://localhost/SE/second.php?id=".$row['id']."";
  
  echo "<a href=$path>$name</a>";
  echo "<br />";
  $file=fopen("info".$i.".txt","r") or exit("Unable to open file!");
  while(!feof($file))
  {
    echo fgets($file). "<br>";
  }
  $i = $i + 1;
  echo "<br />";echo "<br />";echo "<br />";


}

mysqli_close($con);
?>
</body>

</html>