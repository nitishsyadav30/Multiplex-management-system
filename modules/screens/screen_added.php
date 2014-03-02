<?php
$multiplexname=$_POST['multiplexname'];
$screenno=$_POST['screenno'];
$screenid=$_POST['screenid'];
$screencap=$_POST['scrcapacity'];
$balseats=$_POST['balseats'];
$dcseats=$_POST['dcseats'];
$scrstarttime=$_POST['starttime'];
$screndtime=$_POST['endtime'];
$scrruntime=$screndtime-$scrstarttime;
$showPossible=round($scrruntime/3);
//$one = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
//echo date('Y-m-d', $one);
$insert_screen="insert into multiplex_add_screen values();"
?>
