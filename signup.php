<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 	<meta name="description" content="foss assignment" />
 	<meta name="keywords" content="foss work" />
    <title>FORUM</title>
    <link rel="stylesheet" href="forum.css" type="text/css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript">
	     $(document).ready(function(){
            $("input#user").focus(function(){
                $("p#user1").css("color","#FFFFFF");
                     });
                $("input#user").blur(function(){
            $("p#user1").css("color","black");
           });

  $("input#user").focus(function(){
    $("input#user").css("background-color","#FFFFCC");
  });
  $("input#user").blur(function(){
    $("input#user").css("background-color","#FFFFFF");
  });
});
	</script>

</head>
<body>
 <h1 align="center">Query FORUM</h1>
 <?php
 include 'homelink.php';
 ?>
 <div id="container1">
 <div id="content">
<?php
//signup.php
include 'connection.php';


if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo '<form method="post" action="">
	   <fieldset>
       <legend id="login" style="margin:20px; font-size:12px;" >Personal information:</legend>
 	 	Username       : <input type="text" name="user_name" id="user" required="required" /><br /><br />
 		Password       : <input type="password" name="user_pass"  /><br /><br />
		Password again : <input type="password" name="user_pass_check"  /><br /><br />
		E-mail         : <input type="email" name="user_email" required="required" /><br /><br />
 		<input type="submit" value="create" />
		<fieldset>
 	 </form>';
	 echo'<p id="user1">user name should not be more than 10 charecters</p>';
}
else
{
	$errors = array(); 
	
	if(isset($_POST['user_name']))
	{
		if(!ctype_alnum($_POST['user_name']))
		{
			$errors[] = 'The username can only contain letters and digits.';
		}
		if(strlen($_POST['user_name']) > 10)
		{
			$errors[] = 'The username cannot be longer than 10 characters.';
		}
	}
	else
	{
		$errors[] = 'The username field must not be empty.';
	}
	if(isset($_POST['user_pass']))
	{
		if($_POST['user_pass'] != $_POST['user_pass_check'])
		{
			$errors[] = 'The two passwords did not match.';
		}
	}
	else
	{
		$errors[] = 'The password field cannot be empty.';
	}
		if(!empty($errors)) 
	{
		echo '<p id="signup">.. a couple of fields are not filled in correctly..</p><br /><br />';
		echo '<ul>';
		foreach($errors as $key => $value)
		{
			echo '<li id="signup">' . $value . '</li>'; 
		}
		echo '</ul>';
	}
	else
	{
	$sql = "INSERT INTO
					users(user_name, user_pass, user_email ,user_date, user_level)
				VALUES('" . mysql_real_escape_string($_POST['user_name']) . "',
					   '" . md5($_POST['user_pass']) . "',
					   '" . mysql_real_escape_string($_POST['user_email']) . "',
						NOW(),
						0)";
	$result = mysql_query($sql);
		if(!$result)
		{		
			echo '<p id="signup">Something went wrong while registering. Please try again later. ' .mysql_error().'</p>';
		}
		else
		{
			echo '<b id="signup">Congratulations..! You have succesfully registered. 
			      You can now <a href="login.php">log in</a>to use the forum</b>';
		}
	}
}

include 'closing.php';
?>
	
	
	
	
	
	
	
	
	
	