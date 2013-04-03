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
echo '
  <div id="header">
    <div id="navbar">
      <div id="project_title">Project Portal</div>
      <div id="menu_table_container">
          <table border="0">
            <tr>
              <td id="menu_col1"><a href="" id="aboutus">About Us</a></td>
              <td id="menu_col1"><a href="logout.php" id="signout">Sign Out</a></td>
          </table>
      </div>
    </div>
  </div>

  <div id="container">
    <div id="links_table_container">
      <table id="links_table" border="1" cellspacing="0.6" cellpadding="5">
        <tr>
          <td id="projects_col"><a href="home.php" id="projects">Projects</a></td>
        <tr>
        <tr>
          <td id="search_col"><a href="search.html" id="search">Search</a></td>
        <tr>
        <tr>
          <td id="upload_col"><a href="upload.html" id="upload">Upload</a></td>
        <tr>
      </table>
    </div>
    <div id="space_container">';
    $con=mysqli_connect("localhost","root","","projects");

if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project WHERE review='1'");
if (mysqli_error($con))
{
   die(mysqli_error($con));
}

$i = 1;

while(($row = mysqli_fetch_array($result)) && ($i<4) )
{
  $name = $row['Name'];
  $path = "http://localhost/SEFINAL/second.php?id=".$row['id']."";
  $id = $row['id']; 
  echo "<a href=$path>$name</a>";
  echo "<br />";
  $file=fopen("info".$id.".txt","r") or exit("Unable to open file!");
  while(!feof($file))
  {
    echo fgets($file). "<br>";
  }
  $i = $i + 1;
  echo "<br />";echo "<br />";echo "<br />";


}
mysqli_close($con);

    echo '</div>
  </div>';
?>
  </div>
</body>
</html>
