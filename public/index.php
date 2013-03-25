<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      
     
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>
      
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <link href="video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
       <script src="video.js"></script>
<!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    _V_.options.flash.swf = "video-js.swf";
  </script>

</head>
<body>
<h2><font color="Navy ">QuickGig-Its Done!!!! </font></h2>
<div id='fg_membersite_content' >

<?php
require_once("../includes/initialize.php");
require_once("../includes/membersite_config.php");

if($session->is_logged_in()) {
  	redirect_to("customer_home.php");
}

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {  	
        $fgmembersite->RedirectToURL("customer_home.php");
   }
}

?>

      
      


<!-- Form Code Start -->
<div>
<div style="height:500px; position:absolute; width:500px;">


<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="500" height="300" data-setup="{}">
    <source src="video.mp4" type='video/mp4' />
 
</video>


</div>
<div id='fg_membersite' align="right" style="margin-left:500px;">

<form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation' align="left">* required fields</div>

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container' align="left">
    <label for='username'>UserName*:</label><br/>
    <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
    <span id='login_username_errorloc' class='error'></span>
</div>
<div class='container' align="left">
    <label for='password' >Password*:</label><br/>
    <input type='password' name='password' id='password' maxlength="50" /><br/>
    <span id='login_password_errorloc' class='error'></span>
</div>

<div class='container' align="left">
    <input type='submit' name='Submit' value='Submit' />
</div>
<div class='short_explanation'><a href='reset-pwd-req.php'>Forgot Password?</a></div>
</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>
</div>
<br>
<div style="margin-left:1175px;">Or Login with</div>
<br>
<div id='fb'  style="margin-left:1175px;">
<a href="fb_login.php"><img src="images/fb.jpeg" heigth=30 width=30 /></a>
<a href="g+_login.php"><img src="images/g+.jpeg" heigth=30 width=30 /></a>
<a href="login-twitter.php"><img src="images/twitter.jpeg" heigth=30 width=30 /></a>

</div>


</div>

<br>
<div style="margin-left:1160px;">
<a href='register.php' style='text-decoration: none'><font color="blue">Create KL account </font></a></div>


</div>
</body>
</html>
