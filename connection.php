<?php 
session_start();

$server	    = 'localhost';
$username	= 'root';
$password	= 'garuda1993';
$database	= 'thunderbolt';

if(!mysql_connect($server, $username, $password))
{
  die('<p id="signup">Could not connect: ' . mysql_error().'</p>');
}
if(!mysql_select_db($database))
{
  echo '<p id="signup">Error selecting database: ' . mysql_error().'</p>';
}
?>