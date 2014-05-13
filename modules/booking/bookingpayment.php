<?php

include_once '../../config.php';
include_once BASE_PATH.'/header.php';
include_once BASE_PATH.'/includes/connection_final.php';
include_once BASE_PATH . '/includes/retrieve_variables.php';
if ($_REQUEST['booking'] == "Proceed To Payment") {
    $booking_id=1;
    $movie_name = $_POST['movie_name'];
    $mul_name = $_POST['mul_name'];
    $showdate = $_POST['showdate'];
    $showtime = $_POST['showtime'];
    $useremail = $_POST['useremail'];
    $seats = $_POST['nop'];
    $tprice = $_POST['tprice'];
    $booking_insert = "insert into ".$prefix."_booking values('','$movie_name','$mul_name','$useremail','$seats','$showtime','$showdate','$tprice')";
  if(  mysqli_query($con, $booking_insert) or die(mysqli_error($con)))
                    {

        echo "<center><h3>Payment Successful</h3></center>";
        echo "<center><h3>Ticket Booked</h3></center>";
        echo "<center><a href='$address/index.php'>Book Another Ticket</a></center>";
    }
    else
        {
       
         echo "<center><h3>Payment Unsuccessful</h3></center>";
         echo "<center><h3>Ticket Booking Failed</h3></center>";
         echo "<center><a href='$address/index.php'>Try Again</a></center>";
        }
} else {
    echo "<center><h3>Booking Cancelled</h3></center>";
}
