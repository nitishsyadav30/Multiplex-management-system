<?php
   require_once '../../config.php';
   require_once '../../includes/connection_final.php';
  $mult_id=$_REQUEST['name'];
  
  $mult_details_query="select * from multiplex_add_multiplex where mul_id like '$mult_id'";
  $mult_query_result=  mysqli_query($con, $mult_details_query) or die(mysqli_error($con));
  while($mulqueryrow=  mysqli_fetch_array($mult_query_result))
      {
        $id=$mulqueryrow['mul_id'];
        $name=$mulqueryrow['mul_name'];
        $city=$mulqueryrow['mul_city'];
        $area=$mulqueryrow['mul_area'];
        $addr=$mulqueryrow['mul_addr'];
        $screens=$mulqueryrow['mul_screens'];
        echo "<div>";
        echo "<form action='multiplex_edited.php' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>Multiplex Id:</td>";
        echo "<td><input type='text' value='$id' name='mid'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Multiplex name:</td>";
        echo "<td><input type='text' value='$name' name=''></td>";
        echo "</tr>";
        echo "<td>Multiplex city:</td>";
        echo "<td><input type='text' value='$city' name=''></td>";
        echo "</tr>";
        echo "<td>Multiplex area:</td>";
        echo "<td><input type='text' value='$area' name=''></td>";
        echo "</tr>";
        echo "<td>Multiplex address:</td>";
        echo "<td><textarea rows='4' cols='50' value='' name=''>$addr</textarea>";
        echo "</tr>";
        echo "<td>Multiplex screens:</td>";
        echo "<td><input type='text' value='$screens' name=''></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2'><center><input type='submit' value='Update'></center></td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
        echo "</div>";
      }  
?>
