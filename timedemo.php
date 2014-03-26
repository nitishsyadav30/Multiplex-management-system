<?php
 
 $file=fopen('demo.txt','r');
 $string="";
 $darray=array();
 while(!feof($file))
   {
     print_r(fgetcsv($file));
     $darray=fgetcsv($file);
     
   }
  
 fclose($file);
 
  /*
$db="multiplex_management";
 $server_name="localhost";
 $username="multiplex";
 $userpass="multiplex123";
 $prefix ="multiplex"; 

$con_file=fopen('./connectionvariables.txt','w');
 fwrite($con_file,"$db,$server_name,$username,$userpass,$prefix");*/


 ?>