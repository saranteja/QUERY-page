<?php
include 'connection.php';
include 'opening.php';
if($_SESSION['logged_in'] = true)
{
//echo'<p id="signup">welcome'.$_SESSION['user_name'].'</p>';

$sql = "SELECT * FROM
                       topics
				 ORDER BY
				       topic_howlong ASC";
$result = mysql_query($sql);
if(!$result)
{
     echo'<b id="login">something went wrong. try it later</b>';
}
else
{
    if(mysql_num_rows($result) == 0)
	{
        echo'<p id="signup">no topics started yet</p>';	
    }
	else
	{
	    echo'<table id="table" cellspacing="3">
		        <tr>
				    <th id="tab_head" class="leftpart">TOPIC SUBJECT</th>
					<th id="tab_head">STARTED BY</th>
				</tr>';
		while($row = mysql_fetch_assoc($result))
		{
			echo'<tr>';
				    echo'<td id="topic_col">';
					    echo'<h4><a id="topic_sub" href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a></h4><br/>';
						echo'<a style="margin-left:390px;" id="delete" href="deletetopic.php?id='. $row['topic_id'] . '">drop topic</a>';
					echo'</td>';
					echo'<td id="topic_col">';	
						echo'<h4 id="startedby">' . $row['user_name'] . ' on ' .$row['topic_date']. '</h4>';
				    echo'</td>';
			echo'</tr>';
		}
		echo'</table>';
	}
}
}
else{ echo'<p id="signup">please login to use the forum</p>';}
include'closing.php';
?>