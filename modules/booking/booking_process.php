<?php

include '../../config.php';
include '../../includes/connection_final.php';
include '../../header.php';
$selectedmovie = $_POST['dbmovie'];
$selecteddate = $_POST['date'];

$showquery = "select * from multiplex_add_show where movie_name like '$selectedmovie' and show_date <= '$selecteddate' and show_date >= 'time()'";
$showfetched = mysqli_query($con, $showquery) or die("Error: " . mysqli_error($con));
echo "<link rel='stylesheet' type='text/css' href= 'http://localhost/Multiplex_System/css/dropdown.css'>";
echo "<form action='booking_confirmation.php' method='post'>";
echo "<table style='border-spacing: 10px;' class='fancy'>";
while ($showrow = mysqli_fetch_array($showfetched)) {
    $moviename = $showrow['movie_name'];
    $mulname = ucfirst($showrow['mul_name']);
    $screenno = $showrow['screen_no'];
    $showtime = $showrow['show_time'];
    $showdate = $showrow['show_date'];


    echo "<tr>";
    echo "<th>Movie Name</th>";
    echo "<th>Multiplex Name</th>";
    echo "<th>Show Time </th>";
    echo "<th> Show Date</th>";
    echo "<th></th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><a href='../movies/getMovieInfo.php?mname=$moviename' id='$moviename'>$moviename</td>";
    echo "<td>$mulname</td>";

    echo "<td>$showtime </td>";
    echo "<td> $showdate</td>";
    echo "<td><input type='radio' name='bookt' value='$moviename'></td>";
    echo "</tr>";
    echo "<tr>";
    if(isset($_SESSION['CurrentUser'])){
    echo "<td colspan='4'><center><input type='submit' value='Book' id='dbmovie'></center></td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</form>";
