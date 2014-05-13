<?php 
include_once './includes/connection_final.php';
$prefix="multiplex";
$contact_table="create table ".$prefix."_contactus(emailid varchar(100),phone1 bigint(20),phone2 bigint(20))";

if(mysqli_query($con, $contact_table))
   {
    echo "done";
   }
   else
       {
        die(mysqli_errno($con));
       }