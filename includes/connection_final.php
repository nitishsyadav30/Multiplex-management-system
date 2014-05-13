<?php
 
  include dirname(__FILE__).'/retrieve_variables.php';
 
$con = @mysqli_connect($server_name,$username,$userpass,$db) or die(mysql_error());
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($con,$db);

?>

