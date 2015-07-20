<?php
//create_cat.php
include 'connection.php';
include 'opening.php';
//echo'<p id="signup">welcome'.$_SESSION['user_name'].'</p>';

$sql = "SELECT *
		FROM
			posts
		WHERE
			posts.topic_id = " . mysql_real_escape_string($_GET['id']);

			
$result = mysql_query($sql);

    if(!$result)
    {
	    echo '<b id="signup">The posts could not be displayed, please try again later.</b>'.mysql_error();
    }
	else
	{
	    echo'<table id="table" cellspacing="3">
		        <tr>
				    <th id="tab_head" class="leftpart">POSTS</th>
					<th id="tab_head">POSTED BY</th>
				</tr>';
		while($row = mysql_fetch_assoc($result))
		{
			echo'<tr>';
				    echo'<td id="topic_col">';
					    echo'<p id="topic_post" >' . $row['post_content'] . '</p><br/>';
						echo'<a style="margin-left:10px;" id="delete" href="post.php?id='. $row['topic_id'] . '">reply to post</a>';
						//if($row['user_name'] ==($_SESSION['user_name'])||($_SESSION['user_level'])=='1')
						//{
						    echo'<a style="margin-left:300px;" id="delete" href="deletepost.php?id='. $row['post_id'] . '">drop post</a>';
						//}
					echo'</td>';
					echo'<td id="topic_col">';	
						echo'<h4 id="startedby">' . $row['user_name'] . ' on ' .$row['post_date']. '</h4>';
				    echo'</td>';
			echo'</tr>';
		}
		echo'</table>';
		
	}
include 'closing.php';
?>