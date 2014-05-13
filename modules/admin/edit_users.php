<?php
   include_once '../../config.php';
   include_once BASE_PATH.'/includes/connection_final.php';
   include_once BASE_PATH.'/includes/retrieve_variables.php';
  $user_email = $_REQUEST['name'];
  $count=0;
  
  $details_query="select * from ".$prefix."_register where user_email like '$user_email'";
  
  $run_query=  mysqli_query($con, $details_query) or die(mysqli_error($con));
  while($row_fetched=  mysqli_fetch_array($run_query))
       {
        $count++;
        $fname=$row_fetched['fname'];
        $lname=$row_fetched['lname'];
        $user_email=$row_fetched['user_email'];
        $gender=$row_fetched['gender'];
        $city=$row_fetched['city'];
        echo "<div>";
        echo "<form action='./modules/admin/edituser_process.php' method='post'>";
        echo "<table border='0'>";
        echo "<tr>";
        echo "<td>First Name:</td>";
        echo "<td><input type='text' name='fname' value='$fname'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Last Name:</td>";
        echo "<td><input type='text' name='lname' value='$lname'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Email-id</td>";
        echo "<td><input type='text' name='user_email' value='$user_email'></td>";
        echo "</tr>";
        if($gender=="Male")
        {
        echo "<tr>";
        echo "<td>Gender</td>";
        echo "<td><input type='radio' name='gender' id='gender' value='Male' checked='checked' />Male<input type='radio' name='gender' id='gender' value='Female'  />Female</td>";
        echo "</tr>";
        }
        else{
        echo "<tr>";
        echo "<td>Gender</td>";
        echo "<td><input type='radio' name='gender' id='gender' value='Male'/>Male<input type='radio' name='gender' checked='checked' id='gender' value='Female'  />Female</td>";
        echo "</tr>";
        }
        echo "<tr>";
        echo "<td>City</td>";
        echo "<td><select name='city' style='width:150px;'>
                                    <option selected='selected'>Select City</option>
                                    <option value='Mumbai'>Mumbai</option>
                                    <option value='Pune'>Pune</option>
                                    <option value='delhi'>Delhi</option>
                                    <option value='bangalore'>Bangalore</option>
                                    <select/></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan=''><input type='submit' name='editUser' value='Update'></td>";
        echo "<td><input type='submit' name='editUser' value='Delete'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "</table>";
        echo "</form>";
       }
       
       if($count==0)
          {
           echo "<center><h3>No Records found of user ".$user_email."</h3></center>";
          }