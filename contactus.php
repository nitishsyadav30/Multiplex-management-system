<?php
      include './header.php';
      include_once './config.php';
      include_once BASE_PATH.'/includes/connection_final.php';
      include_once BASE_PATH.'/includes/retrieve_variables.php';
       $cemail="";
       $cmum1="";
       $cmum2="";
       $contact_string="select * from ".$prefix."_contactus";
       $result=  mysqli_query($con, $contact_string) or die(mysqli_error($con));
       while($row=  mysqli_fetch_array($result))
            {
             $cemail=$row['emailid'];
             $cmum1=$row['phone1'];
             $cmum2=$row['phone2'];
            }
      if (isset($_SESSION['CurrentUser'])) {

      if ($_SESSION['user_role'] == "1") {
          
       ?>     
            <div align="center">
              <center><h3>Contact Us!</h3></center>
              <form action="./editcontactus.php" method="post">
              <table>
                <tr>
                    <td>Customer Care Email:</td>
                    <td><?php echo "<input type='text' name='cemail' value='$cemail' style='width:200px'>"; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Customer Care Number:</td>
                    <td><?php echo "<input type='text' name='cmum1' value='$cmum1'>"; 
                    ?>
                    </td>
                    <td><?php echo "<input type='text' name='cmum2' value='$cmum2'>"; 
                    ?>
                    </td>
                    </tr>
                    <tr>
                        <td>
                        
                            <input type="submit" value="Insert" name="contact">
                    </td>
                    <td>
                        
                       <input type="submit" value="Update" name="contact">
                    </td>
                </tr>
              </table>
              </form>
              </div>
<?php
     }
      else{
          ?>
             <div align='center'>
              <center><h3>Contact Us!</h3></center>
              <table>
                <tr>
                    <td>Customer Care Email:</td>
                    <td><?php echo "<input type='text' name='cemail' value='$cemail' style='width:200px' readonly>"; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Customer Care Number:</td>
                    <td><?php echo "<input type='text' name='cmum1' value='$cmum1' readonly>"; 
                    ?>
                    </td>
                    <td><?php echo "<input type='text' name='cmum2' value='$cmum2' readonly>"; 
                    ?>
                    </td>
                    </tr>
                   
              </table>
              </div>
     <?php     
      }
  }
  else 
      {
        ?>
               <div align='center'>
              <center><h3>Contact Us!</h3></center>
              <table>
                <tr>
                    <td>Customer Care Email:</td>
                    <td><?php echo "<input type='text' name='cemail' value='$cemail' style='width:200px' readonly>"; 
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Customer Care Number:</td>
                    <td><?php echo "<input type='text' name='cmum1' value='$cmum1' readonly>"; 
                    ?>
                    </td>
                    <tr>
                        <td></td>
                    <td><?php echo "<input type='text' name='cmum2' value='$cmum2' readonly>"; 
                    ?>
                    </td>
                    </tr>
                    </tr>
                   
              </table>
              </div>
      <?php
              }
  ?>   