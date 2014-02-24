<?php
  session_start();
 
/* @var $_POST type */
 $email= $_POST['email'];
 $password= $_POST['password'];
 
  require_once  '../../config.php';
  require_once  BASE_PATH. '/includes/connection_final.php';
  
 $select="select user_email,pass from multiplex_register where user_email like '$email' AND pass like '$password' ";
 
 $queryresult = mysqli_query($con,$select) or die(mysqli_error($con));
 
 while($row_result= mysqli_fetch_array($queryresult))
      {
         if($row_result['user_role']=="1")
             {
               $_SESSION['CurrentUser']=$email;
               //include BASE_PATH. '/adminHome.php';
               Header("Location: $address/index.php"); 
              
             }
             else if($row_result['user_email']=="$email" && $row_result['pass']=="$password")
                 {
                  $_SESSION['CurrentUser']=$email;
               
                  Header("Location: $address/index.php"); 
                 }
                 else 
                     { 
                    
                      
                      }
                 
      }
?>

