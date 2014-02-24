<?php

$con = mysql_connect('localhost','multiplex','multiplex123','multiplex_management') or die(mysql_error);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db('multiplex_management');
?>

