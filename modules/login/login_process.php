<?php
  session_start();
 
/* @var $_POST type */
 $email= $_POST['email'];
 $password= $_POST['password'];
 
  require_once  '../../config.php';
  require_once  BASE_PATH. '/includes/connection_final.php';
  
 $select="select user_email,pass,user_role,fname,lname from multiplex_register where user_email like '$email' AND pass like '$password' ";
 
 $queryresult = mysqli_query($con,$select) or die(mysqli_error($con));
 
 while($row_result= mysqli_fetch_array($queryresult))
      {
         $userole=$row_result['user_role'];
         
         if($row_result['user_role']==1)
             {
              $_SESSION['fname']=$row_result['fname'];
              $_SESSION['lname']=$row_result['lname'];
              $_SESSION['CurrentUser']=$email;
               $_SESSION['user_role']=$userole;
               //$_SESSION['id']=$row_result['user_role'];
               //include BASE_PATH. '/adminHome.php';
               Header("Location: $address/index.php"); 
              
             }
             else if($row_result['user_email']=="$email" && $row_result['pass']=="$password")
                 {
                 $_SESSION['fname']=$row_result['fname'];
              $_SESSION['lname']=$row_result['lname'];
                 $_SESSION['CurrentUser']=$email;
                  $_SESSION['user_role']=$userole;
               
                  Header("Location: $address/index.php"); 
                 }
                 else 
                     { 
                    
                      
                      }
                 
      }
?>

