<?php

include '../../config.php';
include BASE_PATH . '/includes/connection_final.php';
include "../../index.php";
include BASE_PATH . '/modules/movies/admin_MenuOptions.php';
$mul_id = $_POST['mul_id'];
$mul_name = $_POST['mul_name'];
$mul_city = $_POST['mul_city'];
$mul_area = $_POST['mul_area'];
$mul_addr = $_POST['mul_address'];
$mul_screens = $_POST['mul_screens'];


// echo "table exist already";
$insert_sql = "insert into multiplex_add_multiplex values('$mul_id','$mul_name','$mul_city','$mul_area','$mul_addr','$mul_screens');";
$insert_result = mysqli_query($con, $insert_sql);
if ($insert_result == TRUE) {
    
    echo '<script>alert("You Have Successfully added a multiplex ");</script>';
    
    ?>
   
    <?php
} else {
    echo "Error:" . mysqli_error($con);
    Header("Location:$string/adminHome.php");
    
}
?>