<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>

    <title>Portal</title>
    <link href="css/admin_search.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
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
    header("Location:index.html");
    die();
}


echo '<a href="logout.php">Log Out</a>';
echo '<br>';

echo '<div id="space_container">';
echo '<a href="upload.html"> <input type="button" name="upload" value="Upload Project"> </a>;


      <div id="searching">
          <form action="search.php" method="post">
          <input type="text" id="search_name" name="search"/>
          <select id="options" name="options">
            <option disabled="disabled" selected="selected">--Select--</option>
            <option>Name</option>
            <option>Domain</option>
            <option>Year</option>
            <option>Languages</option>
          </select>
          <input type="submit" value="Search" id="search_button" name="submit"/>
      </div>
    
<br><br><br><br>';

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

echo '</div>';

mysqli_close($con);
?>
</body>

</html>