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
        echo "<form action='./modules/multiplex/editmultiplex_process.php' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>Multiplex Id:</td>";
        echo "<td><input type='text' value='$id' name='mul_id' editable='false'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Multiplex name:</td>";
        echo "<td><input type='text' value='$name' name='mul_name'></td>";
        echo "</tr>";
        echo "<td>Multiplex city:</td>";
        echo "<td><input type='text' value='$city' name='mul_city'></td>";
        echo "</tr>";
        echo "<td>Multiplex area:</td>";
        echo "<td><input type='text' value='$area' name='mul_area'></td>";
        echo "</tr>";
        echo "<td>Multiplex address:</td>";
        echo "<td><textarea rows='4' cols='50' value='' name='mul_addr'>$addr</textarea>";
        echo "</tr>";
        echo "<td>Multiplex screens:</td>";
        echo "<td><input type='text' value='$screens' name='mul_screens'></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan=''><input type='submit' value='Update' name='editMultiplex'></td>";
        echo "<td colspan=''><input type='submit' value='Delete' name='editMultiplex'></td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
        echo "</div>";
      }  
?>
