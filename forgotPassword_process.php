<?php
 include './includes/connection_final.php';
 include './includes/retrieve_variables.php';
  $email=$_POST['femail'];
  $subject="Forgot Password";
  $from="admin@multiplex.com";
  $password="";  
  $query="select pass from ".$prefix."_register where user_email like '$email'";
  $result=mysqli_query($con, $query) or die(mysqli_error($con));
  while($row=  mysqli_fetch_array($result))
       {
         $password=$row['pass'];
       }

       mail($email, $subject,$password, $from);
       echo "Password sent to your email address";