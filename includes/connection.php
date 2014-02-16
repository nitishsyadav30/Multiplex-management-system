<?php
$prefix="multiplex";
$con = mysql_connect('localhost','multiplex','multiplex123','formultiplex') or die(mysql_error);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db('formultiplex');
?>

