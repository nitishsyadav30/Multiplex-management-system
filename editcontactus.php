<?php
     include './header.php';
     include_once './config.php';
     include_once BASE_PATH.'/includes/connection_final.php';
     include_once BASE_PATH.'/includes/retrieve_variables.php';
 $email=$_POST['cemail'];
 $num1=$_POST['cmum1'];
 $num2=$_POST['cmum2'];
      if($_REQUEST['contact']=="Insert")
          {
            $insert_contact="insert into ".$prefix."_contactus values('$email','$num1','$num2')";
            mysqli_query($con, $insert_contact) or die();
          }
          else
              {
               $update_contact="UPDATE ".$prefix."_contactus SET emailid= '$email',phone1 = $num1,phone2=$num2";
               mysqli_query($con, $update_contact) or die("ERROR UPDATING");
              }