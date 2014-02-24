<?php
  session_start();
 
/* @var $_POST type */
 $email= $_POST['email'];
 $password= $_POST['password'];
 
  require_once  '../../config.php';
  require_once  BASE_PATH. '/includes/connection_final.php';
  
 $select="select uname,pass from multiplex_register where user_email like '$email' AND pass like '$password' ";
 
 $queryresult=mysqli_query($con,$select) or die(mysqli_error($con));
 
 while($row_result= mysqli_fetch_array($queryresult))
      {
         if($row_result['user_email']=="admin@multiplex.com" && $row_result['pass']=="admin123")
             {
               $_SESSION['CurrentUser']=$email;
               //include BASE_PATH. '/adminHome.php';
               Header("Location: $address/index.php"); 
              
             }
             else if($row_result['user_email']=="$uname" && $row_result['pass']=="$password")
                 {
                  $_SESSION['CurrentUser']=$email;
               
                  Header("Location: $address/index.php"); 
                 }
                 else 
                     { 
                    
                      
                      }
                 
      }
?>

