<?php
   require_once '../../includes/connection_final.php';
   require_once '../../includes/retrieve_variables.php';
 $mul_value=$_REQUEST['name'];
 if($mul_value == "null" )
 {
     echo "<select><option>Select Multiplex First</option></select>";
 }
 $getscreens="select mul_screens from ".$prefix."_add_multiplex where mul_id like '$mul_value'";
 $getscreens_query=  mysqli_query($con, $getscreens);
 
 while($getscreens_row=  mysqli_fetch_array($getscreens_query))
 {
     $screens_fetched=$getscreens_row['mul_screens'];
    ?>
<select id="screensadded" name="screenno">
    <option value="">Select</option>
    <?php
      for($scr=1;$scr<=$screens_fetched;$scr++)
      {
         
               echo "<option value='$scr' name='$scr'>$scr</option>";
      }
    ?>
</select>
<?php
 }
?>

