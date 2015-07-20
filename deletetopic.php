<?php
include 'connection.php';
include 'opening.php';
$sql="SELECT
           user_id
		FROM
		   topics
		WHERE
		   topic_id=". mysql_real_escape_string($_GET['id']);
$result1=mysql_query($sql);
if(!$result1)
{
    echo'<b id="signup">error selecting the user id </b>'.mysql_error();
}
else
{
$row=mysql_fetch_row($result1);
    if(($_SESSION['user_level'] == 1)||($row[0] == $_SESSION['user_id']))
	{
	    $sql="DELETE FROM posts
              WHERE topic_id=". mysql_real_escape_string($_GET['id']);
		$result2=mysql_query($sql);
		
	    $sql="DELETE FROM topics
              WHERE topic_id=". mysql_real_escape_string($_GET['id']);
		$result3=mysql_query($sql);
		if((!$result2)||(!$result3))
		{
         echo'<b id="signup">error deleting the topic.try again later </b>'.mysql_error();
		}
		else
		{
		 echo'<p id="login">success deleting the topic</p>';
		}
	}
	else
	{
	    echo'<b id="signup">sorry u donot have enough rights to delete this post</b>';
	}
}
include'closing.php';
?>