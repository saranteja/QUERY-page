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


include 'connection.php';


if($_SESSION['logged_in'] == true)
{
	//unset all variables

     session_destroy();


	echo '<b id="signup">Succesfully logged out.want to <a href="login.php">login again?</a></b>';
}
else
{
	echo '<p id="signup">Sorry..You havenot logged in.</p> ';
}

include 'closing.php';
?>