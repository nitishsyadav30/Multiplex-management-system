<?php
   include_once '../../config.php';
include_once BASE_PATH . '/includes/connection_final.php';
include_once BASE_PATH . '/includes/retrieve_variables.php';
include_once BASE_PATH . '/header.php';

$oldpass=md5($_POST['oldpass']);
$newpass=md5($_POST['newpass1']);
$email= $_SESSION['CurrentUser'];
$getpass="select pass from ".$prefix."_register";
$result=  mysqli_query($con, $getpass) or die();

while($row=  mysqli_fetch_array($result))
     {
       if($row['pass']==$oldpass)
           {
             $changepass="update ".$prefix."_register set pass = '$newpass' where user_email like '$email'";
             mysqli_query($con, $changepass) or die(mysqli_error($con));
             die("<center><h3>Password Changed Successfully!!</h3></center>");
           }
     }
     die("<center><h3>Wrong Old Password</h3></center>");
