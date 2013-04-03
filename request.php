<html>


<head>
</head>



<body>
<?php
session_start();
if ($_SESSION['is_logged_in'] == 0 )
{
    header("Location:index.php");
    die();
}
$id = $_GET['id'];
$path = "req.php?id=" .$id. "";

echo "<form action=$path method='post'>
		<div>
			Why do you want the source code?
			<br>
			<textarea rows='5' cols='30' id='ta' name='ta'></textarea>
			<input type='submit' name='submit' id='submit' value='send'>
		</div>
	</form>
</body>";

?>

</html>