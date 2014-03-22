<?php
  require_once '../../config.php';
  include '../../header.php';
$multiplexname=$_POST['multiplexname'];
$screenno=$_POST['screenno'];
$screenid=$_POST['screenid'];
$screencap=$_POST['scrcapacity'];
$balseats=$_POST['balseats'];
$dcseats=$_POST['dcseats'];

//$one = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
//echo date('Y-m-d', $one);
$getmulid="select mul_id from multiplex_add_multiplex where mul_name like '$multiplexname'";
$getmulid_query=  mysqli_query($con, $getmulid);
while($getmulid_query_row=  mysqli_fetch_array($getmulid_query))
    {
     $mul_id_fetched=$getmulid_query_row['mul_id'];
    }
      
$insert_screen="insert into multiplex_add_screen values('$screenid','$screenno','$mul_id_fetched','$screencap','$balseats','$dcseats')";
if(mysqli_query($con, $insert_screen))
{
    echo "Screen Added";
}
else echo "mysqli_error($con)";
?>
