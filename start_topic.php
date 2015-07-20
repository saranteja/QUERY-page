<?php
//create_topic.php
include 'connection.php';
include 'opening.php';

echo'<h2 color="cyan">Start A Topic</h2>';

    if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo '<form  method="post" action="">
			subject: <input type="text" name="topic_subject" /><br />
			content:<br /> <textarea name="topic_content" id="textarea" /></textarea><br /><br />
			<input type="submit" value="Start Topic" />
		 </form>';
    }
	else
	{
		$sql = "INSERT INTO topics(topic_subject,
		                             topic_content,
									 user_id,
									 user_name,
									 topic_date,
									 topic_howlong)
		   VALUES('" . mysql_real_escape_string($_POST['topic_subject']) . "',
				  '" . mysql_real_escape_string($_POST['topic_content']) . "',
				  ' ".htmlentities($_SESSION['user_id'])." ',
				  ' ".htmlentities($_SESSION['user_name'])." ',
				  NOW(),
				  NOW())";
		$result = mysql_query($sql);
		if(!$result)
		{
			echo '<b id="signup">An error occured while inserting your data. Please try again later.</b><br /><br />' . mysql_error();
			$sql = "ROLLBACK;";
			$result = mysql_query($sql);
		}
		else
		{
			$topicid = mysql_insert_id();
				
		$sql = "INSERT INTO posts(post_content,
									 user_id,
									 user_name,
									 topic_id,
									 post_date,
									 post_howlong)
		   VALUES('" . mysql_real_escape_string($_POST['topic_content']) . "',
				  ' ".htmlentities($_SESSION['user_id'])." ',
				  ' ".htmlentities($_SESSION['user_name'])." ',
				  ".$topicid.",
				  NOW(),
				  NOW())";				
				$result = mysql_query($sql);
				if(!$result)
				{
					echo '<b id="signup">An error occured while inserting your post. Please try again later.</b><br /><br />' . mysql_error();
					$sql = "ROLLBACK;";
					$result = mysql_query($sql);
				}
				else
				{
					$sql = "COMMIT;";
					$result = mysql_query($sql);
					
					
					echo '<b id="signup">You have succesfully started <a href="topic.php?id='. $topicid . '">your new topic</a>.</b>';
	            }
		}
	}
include 'closing.php';		
?>
		
		
		
		
		
		
		
		