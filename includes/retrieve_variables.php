<?php
$filename= dirname(__FILE__). "/variables.php";
$file_open=fopen($filename,"r+");
while(!feof($file_open))
                 {
                   $variables=fgets($file_open);
                 }


$array=  explode(",", $variables);
 
 $db=$array[0];
 $server_name=$array[1];
 $username=$array[2];
$userpass=$array[3];
$prefix=$array[4];;

?>

