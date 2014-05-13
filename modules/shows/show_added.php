<?php

include '../../config.php';
include BASE_PATH . '/includes/connection_final.php';
include BASE_PATH . '/includes/retrieve_variables.php';
include BASE_PATH . '/header.php';

$movie_name = $_POST['movie_select'];
$multiplex_name = $_POST['multiplexselected'];
$screen_select = $_POST['screenno'];
$time_selected = $_POST['time_selected'];
$showdate = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_POST['showdate'])));
$showid = 1;
$insert_show = "insert into ".$prefix."_add_show values('','$movie_name','$screen_select','$multiplex_name','$showdate','$time_selected')";

if (!mysqli_query($con, $insert_show)) {
    echo "Cannot add movie" . mysqli_error($con);
}
?>