<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Portal</title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<?php
$_SESSION['is_logged_in'] = 0;
session_destroy();
echo '<a href="logout.php">Log Out</a>

<div id="header">
	<div id="welcome">Project Portal</div>
</div>

<div id="body1">
	<div id="welcome_message">Welcome</div>
	<div id="welcome_body">
		
	</div>
</div>

<div id="body2">
<form action="login.php" method="post">
	<div id="login">
		<div id="a_s">Login as admin/student</div>
		<hr id="hrinlogin">
		<div id="logincontainer">
			<div id="Username">Name</div> 
			<input id="name" name="name" type="text"/>
			<div id="Pass">Password</div> 
			<input id="pass" name="pass" type="password"/>
			<a href="signup.html"><input id="signup" type="button" value="Sign Up"/></a>
			<input id="send" type="submit" value="Login"/>
		</div>
		<hr id="hrinlogin2">
	</div>
</form>
</div>

<div id="footer"></div>';
?>

</body>
</html>