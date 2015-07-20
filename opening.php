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
 <div id="container1"> 
   <div id="menu">
      <?php
	     if(($_SESSION['logged_in'] == true)&&($_SESSION['user_level'] ==0))
		    {//preparing the menu
		      echo '<p align="center" id="login" style="color:sienna;margin:20px">welcome ' . htmlentities($_SESSION['user_name']) .'</p>';
		      echo' <table border="0" width="1000" height="60" cellspacing="10" cellpadding="20">
		              <tr>
				         <th align="left"><a  href="./main.php" class="menu1">HOME</a></th>
				         <th  ><a  href="./beadmin.php" style="margin-left:55px;" class="menu1">BECOME AN ADMIN</a></th>
				         <th align="right"><a  href="./logout.php" class="menu1">LOGOUT</a></th>
				      </tr>
					  <tr>
					     <th colspan="3">
						      <a align="center" href="./start_topic.php" class="menu1">Start A New Topic??</a>
						 </th>
					  </tr>
			        </table>';
					 
            }
			else
			{
	            if(($_SESSION['logged_in'] == true)&&($_SESSION['user_level'] ==1))
		        {//preparing the menu
		          echo '<p align="center" id="login" style="color:sienna;margin:20px">welcome ' . htmlentities($_SESSION['user_name']) .'</p>';
		          echo' <table border="0" width="1000" height="60">
		                    <tr>
				             <th align="left"><a  href="./main.php" class="menu1">HOME</a></th>
				             <th align="right"><a  href="./logout.php" class="menu1">LOGOUT</a></th>
				            </tr>
					        <tr>
					         <th colspan="3" align="center">
						         <a  href="./start_topic.php" class="menu1">Start A New Topic??</a>
						     </th>
					        </tr>
			           </table>';			    
			    }
		        else
		        {
			      echo '<table border="0" width="1000" height="60" align="center">
		                    <tr>
				             <th align="left"><a  href="./login.php" class="menu1">LOGIN</a></th>
						     <th align="right"><a  href="./signup.php" class="menu1">new user???</a></th>
				            </tr>
					    </table>';
					
		        }
			}
	   ?>
    </div>
	<div id="forum_data">
	
	
	
