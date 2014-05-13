<?php

include '../../config.php';
include '../../includes/connection_final.php';
include '../../header.php';
 $selectedmovie = $_POST['dbmovie'];
 $selecteddate = $_POST['date'];


echo "<link rel='stylesheet' type='text/css' href= 'http://localhost/Multiplex_System/css/dropdown.css'>";
echo "<form action='booking_confirmation.php' method='post'>";
 echo "<a href='$address/modules/movies/getMovieInfo.php?mname=$selectedmovie'><h3>$selectedmovie</h3></a>";
echo "<table style='border-spacing: 10px;' class='fancy'>";
 echo "<tr>";
    //echo "<th>Movie Name</th>";
    echo "<th>Multiplex Name</th>";
    echo "<th>Show Time </th>";
    echo "<th> Show Date</th>";
    echo "<th>Balcony Seat Price</th>";
    echo "<th>DC Seat Price</th>";
    echo "<th>Select Movie</th>";
    echo "</tr>";
//$showquery = "select * from multiplex_add_show where movie_name like '$selectedmovie' and show_date >= '$selecteddate' and show_date >= 'time()'";
$showfetched = mysqli_query($con,"select * from multiplex_add_show  where movie_name like '$selectedmovie' and show_date >= '$selecteddate'") or die();
while($showrow = mysqli_fetch_array($showfetched)) {
    
    $moviename = $showrow['movie_name'];
    $mulid = ucfirst($showrow['mul_name']);
    $screenno = $showrow['screen_no'];
    $showtime = $showrow['show_time'];
    $showdate = $showrow['show_date'];
    $balcony_price=$showrow['balcony_price'];
    $dc_price=$showrow['dc_price'];
      
    $result=mysqli_query($con, "select mul_name from multiplex_add_multiplex where mul_id like '$mulid'");
    $mul_name="";
    while($row=  mysqli_fetch_array($result))
      {
        $mul_name=$row['mul_name'];
      }
    echo "<tr>";
   // echo "<td><a href='../movies/getMovieInfo.php?mname=$moviename' id='$moviename'>$moviename</td>";
   // echo "<td>$mulname</td>";
    echo "<td><input type='text' value='$mul_name' readonly> </td>";
    echo "<td><input type='text' value='$showtime' readonly> </td>";
    echo "<td> <input type='text' value='$showdate' readonly></td>";
    echo "<td><input type='text' value='$balcony_price' readonly></td>";
    echo "<td><input type='text' value='$dc_price' readonly></td>";
    echo "<td><center><input type='radio' name='bookt' value='$showdate.$showtime.$mul_name.$moviename.$balcony_price.$dc_price'></center></td>";
    echo "</tr>";
    
}
echo "<tr>";
    if(isset($_SESSION['CurrentUser'])){
    echo "<td colspan='4'><center><input type='submit' value='Book' id='dbmovie'></center></td>";
    }
    echo "</tr>";
echo "</table>";
echo "</form>";
?>