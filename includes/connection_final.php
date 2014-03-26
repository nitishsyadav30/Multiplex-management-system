<?php


$con = mysqli_connect("localhost", "multiplex", "multiplex123") or die(mysql_error);
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($con, 'multiplex_management');
?>

