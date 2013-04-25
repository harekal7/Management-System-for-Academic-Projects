<!DOCTYPE html>
<html lang="en">

<head>

  <link href="css/admin.css" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Nova+Square' rel='stylesheet' type='text/css'>
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

echo '<a href="admin_request.php">Check Requests</a>';
echo '<br>';


echo '<a href="search.html">Search Projects</a><br>';

echo "<br><br>";
echo "<br><br>";

$con=mysqli_connect("localhost","root","","projects");

if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project");
if (mysqli_error($con))
{
   die(mysqli_error($con));
}

echo '<a href="home.php">HOME PAGE</a><br><br>';


while($row = mysqli_fetch_array($result))
{
   $name = $row['Name'];
   $id = $row['id'];
   $path = "second.php?id=".$row['id']."";
   //echo "<br>$id<br>";
   echo "<a href=$path>$name</a>";
   $delete = "delete_project.php?id=".$row['id']."";
   echo "<a href=$delete><input type='button' name='delete' id='delete' value='Delete'></a>";
   echo "<br />";
   $file=fopen("info".$id.".txt","r") or exit("Unable to open file!");
   while(!feof($file))
   {
      echo fgets($file). "<br>";
   }
   echo "<br /><br />";
}

echo '</table>';

mysqli_close($con);
?>
</div>
</body>

</html>