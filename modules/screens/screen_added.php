<?php
  require '../../config.php';
  include '../../header.php';
  include    '../../includes/connection_final.php';
  
 $multiplexid=$_POST['multiplexname'];
 $screenno=$_POST['screenno'];
 $screenid=$_POST['screenid'];
 $screencap=$_POST['scrcapacity'];
 $balseats=$_POST['balseats'];
 $dcseats=$_POST['dcseats'];
/*
$getmulid = "select mul_id from multiplex_add_multiplex where mul_name like '$multiplexname' ";
$getmulid_query = mysqli_query($con, $getmulid);
$mul_id_fetched = "";
while($getmulid_query_row =  mysqli_fetch_array($getmulid_query))
    {
     echo  $getmulid_query_row['mul_id'];
    }
 */
 
   
$insert_screen = "insert into multiplex_add_screen values('$screenid','$screenno','$multiplexid','$screencap','$balseats','$dcseats')";
if(mysqli_query($con, $insert_screen))
{
    echo "Screen Added";
}
else{ mysqli_error($con);}



?>
