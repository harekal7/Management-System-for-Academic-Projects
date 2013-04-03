<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Portal</title>
  <link href="css/student.css" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Nova+Square' rel='stylesheet' type='text/css'>

<script type="text/javascript">

</script>
</head>

<body >
<?php
session_start();
if ($_SESSION['is_logged_in'] == 0 )
{
    header("Location:index.html");
    die();
}
$con=mysqli_connect("localhost","root","","projects");

if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM request WHERE grant1='0'");
if (mysqli_error($con))
{
   die(mysqli_error($con));
}

$i = 1;
$j = 1;

while($row = mysqli_fetch_array($result))
{
  $name = $row['name'];
  $id = $row['id'];
  echo "Username : ".$row['name']. "<br>";
  echo "Project Number : ".$row['id']. "<br>";
  echo "Why ".$row['name']." needs this source code : ".$row['ta']. "<br>";
  echo "<a href='grant_access.php?name=$name&id=$id'><input type='submit' name='ga.$i.' id='ga.$i.' value='Grant Access'></a>";
  echo "<a href='deny_access.php?name=$name&id=$id'><input type='submit' name='da.$j.' id='da.$j.' value='Deny Access'></a>";
  echo "<br><br>";
}

mysqli_close($con);
?>
</body>
</html>