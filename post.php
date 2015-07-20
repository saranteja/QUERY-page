<?php
include 'connection.php';
include 'opening.php';

echo'<h2 color="cyan">Post The Reply</h2>';



    if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '<form  method="post" action="">
			content:<br /> <textarea name="post_content" id="textarea"/></textarea><br /><br />
			<input type="submit" value="post" />
		 </form>';
    }
	else
	{
		$sql = "INSERT INTO posts(post_content,
		                             topic_id,
									 user_id,
									 user_name,
									 post_date,
									 post_howlong)
		   VALUES('" . mysql_real_escape_string($_POST['post_content']) . "',
		          '" . mysql_real_escape_string($_GET['id']) . "',
				  ' ".htmlentities($_SESSION['user_id'])." ',
				  ' ".htmlentities($_SESSION['user_name'])." ',
				  NOW(),
				  NOW())";
		$result = mysql_query($sql);
		if(!$result)
		{
			echo '<b id="signup">Error' . mysql_error() .'</b>';
		}
		else
		{
			echo '<a id="login" href="topic.php?id=' . mysql_real_escape_string($_GET['id']) . '" >New topic succesfully added.</a>';	
        }
    }

include 'closing.php';
?>
	