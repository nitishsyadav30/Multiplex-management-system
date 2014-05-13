<?php

include_once '../../config.php';
include_once BASE_PATH . '/includes/connection_final.php';
include_once BASE_PATH . '/includes/retrieve_variables.php';
include_once BASE_PATH . '/header.php';
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $user_email=$_POST['user_email'];
        $gender=$_POST['gender'];
        $city=$_POST['city'];
if ($_REQUEST['editUser'] == "Update") 
    {
      $update_string = "update " . $prefix . "_register set fname = '$fname',lname = '$lname', user_email = '$user_email', gender = '$gender', city ='$city' where user_email like '$user_email'";
       if (mysqli_query($con, $update_string)) {
        echo "<center><h3>User Updated Successfully!!</h3></center>";
    } else {
        mysqli_error($con);
    }
} else {
    $delete_string = "delete from " . $prefix . "_register where user_email like ''";
    if (mysqli_query($con, $delete_string)) {

        echo '<h3>Movie Successfully Deleted</h3>';

        // Header("Location: $address/index.php");
    } else {
        mysqli_error($con);
    }
}

