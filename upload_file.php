<html>

<body>

<?php
$name=$_POST['title'];
$author=$_POST['authors'];
$guide=$_POST['guide'];
$year=$_POST['year'];
$pl=$_POST['languages'];
$domain=$_POST['domain'];
$status=$_POST['check'];
//$file=$_POST['file'];

//echo $file=$_POST['file'];
/*
if ($_SESSION['is_logged_in'] == 0 )
{
    header("Location:index.html");
    die();
}
*/
$con=mysqli_connect("localhost","root","a","projects");
if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql="INSERT INTO review (name, author, guide, year, pl, domain, status) VALUES
	('$name', '$author', '$guide', '$year', '$pl', '$domain', '$status')";


if (!mysqli_query($con,$sql))
{
	die('Error: ' . mysqli_error());
}
else
{
	echo "Row inserted";
}

/*
if ($status==true)
{
	if ($_FILES["file"]["error"] > 0)
	{
	  echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}

	else
	{
	  	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	  	echo "Type: " . $_FILES["file"]["type"] . "<br>";
	  	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	  	echo "Stored in: " . $_FILES["file"]["tmp_name"];
	  

		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " already exists. ";
		}
		else
		{
			move_uploaded_file($_FILES["file"]["tmp_name"],
		    "upload/" . $_FILES["file"]["name"]);
		    echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		}
	}
}
*/
?>

</body>

</html>