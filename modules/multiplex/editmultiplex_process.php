<?php

include_once '../../config.php';
include_once BASE_PATH . '/includes/connection_final.php';
include_once BASE_PATH . '/header.php';
$id=$_POST['mul_id'];
$name = $_POST['mul_name'];
$city = $_POST['mul_city'];
$area = $_POST['mul_area'];
$addr = $_POST['mul_addr'];
$screens = $_POST['mul_screens'];
if ($_REQUEST['editMultiplex'] == "Update") {

    $update_multiplex = "update " . $prefix . "_add_multiplex set mul_name = '$name',mul_city = '$city', mul_area = '$area', mul_addr = '$addr', mul_screens ='$screens' where mul_id like '$id'";
    if (mysqli_query($con, $update_multiplex)) {
        echo "<center><h3>Multiplex Updated Successfully!!</h3></center>";
    } else {
        mysqli_error($con);
    }
} else {
    $delete_string = "delete from " . $prefix . "_add_multiplex where mul_name like '$name'";
    if (mysqli_query($con, $delete_string)) {

        echo '<center><h3>Multiplex Successfully Deleted</h3></center>';

        // Header("Location: $address/index.php");
    } else {
        mysqli_error($con);
    }
}
