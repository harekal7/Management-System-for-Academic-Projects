<html>

<body>

<?php


	if ($_FILES["file"]["error"] > 0)
    {
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
	else
    {
		echo "Successfully uploaded <br>";
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

		if (file_exists("C:/xampp/htdocs/test/uploaded/" . $_FILES["file"]["name"]))
		{
		  echo $_FILES["file"]["name"] . " already exists. ";
		}
		else
		{
		  move_uploaded_file($_FILES["file"]["tmp_name"],
		  "C:/xampp/htdocs/test/uploaded/" . $_FILES["file"]["name"]);
		  echo "Stored in: " . "/test/uploaded/" . $_FILES["file"]["name"];
		}
    }
  
?>

</body>

</html>