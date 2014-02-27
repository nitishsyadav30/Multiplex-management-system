<?php
  $mname=$_REQUEST['name'];
  $sno=$_REQUEST['no'];
  $scr_id=$mname . $sno;
  echo "<input type='text' name='screenid' value='$scr_id' />";
?>
