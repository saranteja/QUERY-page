<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 	<meta name="description" content="foss assignment" />
 	<meta name="keywords" content="foss work" />
    <title>FORUM</title>
    <link rel="stylesheet" href="forum.css" type="text/css">
</head>
<body>
 <h1 align="center">Query FORUM</h1>
 <?php
 include 'homelink.php';
 ?>
 <div id="container1">
 <div id="content">
 <?php
 //become an admin beadmin.php-password is thunderbolt
 include 'connection.php';
 	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '<form method="post" action="">
			Username: <input type="text" name="user_name" /><br /><br />
			Password: <input type="password" name="user_pass"><br /><br />
			Admin pass:<input type="password" name="admin_pass"><br/><br/>
			<input type="submit" value="Sign in" />
		 </form>';
		echo '<p id="login">Note</a><b id="signup">To become an admin u must know the special password</b>';
	}
    else
    {
        $errors=array();
        if(!isset($_POST['user_name']))
		{
			$errors[] = 'The username field must not be empty.';
		}
		if($_POST['user_name']!=$_SESSION['user_name'])
		{
			$errors[] = 'The username you entered is different from the login user name.';
		}
		
		if(!isset($_POST['user_pass']))
		{
			$errors[] = 'The password field must not be empty.';
		}
				
	    if(!isset($_POST['admin_pass']))
		{
			$errors[] = 'The admin password field must not be empty.';
		}
		if(!empty($errors)) 
		{
			echo '<p id="signup">any or both of fields are not filled in correctly..</p><br /><br />';
			echo '<ul>';
			foreach($errors as $key => $value) 
			{
				echo '<li>' . $value . '</li>'; 
			}
			echo '</ul>';
		}	
		else
		{
			$sql = "SELECT 
						user_id,
						
						user_level
					FROM
						users
                    WHERE
						user_name = '" . mysql_real_escape_string($_POST['user_name']) . "'
					AND
						user_pass = '" . md5($_POST['user_pass']) . "'";
						
			$result = mysql_query($sql);
			if(!$result)
			{
				echo '<p id="signup">Something went wrong while signing in. Please try again later.</p>';
			}
			else
			{
				if(mysql_num_rows($result) == 0)
				{
					echo '<p id="signup">You have supplied a wrong user/password combination. Please try again.</p>';
				}
                else
                {
                    if($_POST['admin_pass']!="thunderbolt")
					{
					    echo'<p id="signup">u have supplied a wrong admin password</p>';
				    }
					else
					{
					
					mysql_query("UPDATE users SET user_level = 1
					             WHERE user_id=".htmlentities($_SESSION['user_id'])."");
								
					 
					 echo'<b id="signup">Congratulations, ' . $_SESSION['user_name'] . 'Your status is updated to admin now. <br />To get the privilages<a href="logout.php">logout now</a> and login again.</b>';
					
                    }
				}
			}
		}
	}
include'closing.php';
?>






				
		
		
		
		