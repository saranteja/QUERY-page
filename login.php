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
//login.php
include 'connection.php';
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '<p id="login">login here</p><br />';
		echo '<form method="post" action="">
			Username: <input type="text" name="user_name" /><br /><br />
			Password: <input type="password" name="user_pass"><br /><br />
			<input type="submit" value="Sign in" />
		 </form>';
		echo '<b id="signup"><br/><br/><br/>do not have an account<br/><a id="login" href="./signup.php">register here</a></b>';

	}
	else
	{
		$errors = array(); 
		
		if(!isset($_POST['user_name']))
		{
			$errors[] = 'The username field must not be empty.';
		}
		
		if(!isset($_POST['user_pass']))
		{
			$errors[] = 'The password field must not be empty.';
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
						user_name,
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
				
					$_SESSION['logged_in'] = true;
					while($row = mysql_fetch_assoc($result))
					{
						$_SESSION['user_id'] 	= $row['user_id'];
						$_SESSION['user_name'] 	= $row['user_name'];
						$_SESSION['user_level'] = $row['user_level'];
					}			
					//echo'welcome'.$row['user_id'].$row['user_name'].$row['user_level'];
					echo '<b id="signup">Welcome, ' . $_SESSION['user_name'] . '. <br /><a href="./main.php">want to see the forum??</a>.</b>';
				}
			}
		}
	}

include 'closing.php';
?>					