<?php
  session_start();
 
/* @var $_POST type */
 $uname= $_POST['uname'];
 $password= $_POST['password'];
 
  require_once  '../../config.php';
  require_once  BASE_PATH. '/includes/connection.php';
  
 $select="select uname,pass from register where uname like '$uname' AND pass like '$password' ";
 
 $queryresult=mysql_query($select) or die(mysql_error());;
 
 while($row_result= mysql_fetch_array($queryresult))
      {
         if($row_result['uname']=="admin" && $row_result['pass']=="admin")
             {
               $_SESSION['CurrentUser']=$uname;
               //include BASE_PATH. '/adminHome.php';
               Header("Location: $address/index.php"); 
              
             }
             else if($row_result['uname']=="$uname" && $row_result['pass']=="$password")
                 {
                  $_SESSION['CurrentUser']=$uname;
               
                  Header("Location: $address/index.php"); 
                 }
                 else 
                     { 
                    
                      
                 }
                 
      }
?>

