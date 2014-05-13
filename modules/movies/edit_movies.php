<?php

$movie = "";
require_once '../../config.php';
include BASE_PATH . '/includes/connection_final.php';
include_once BASE_PATH . '/includes/retrieve_variables.php';
$mov_id = "";
$mov_id = $_REQUEST['name'];
//echo "$mov_id";
$moviequery = "select * from multiplex_admin_movies where movie_id like '$mov_id'";
$moviequeryresult = mysqli_query($con, $moviequery);
while ($moviequeryrow = mysqli_fetch_array($moviequeryresult)) {
    $rowmovieid = $moviequeryrow['movie_id'];
    $rowmoviename = $moviequeryrow['movie_name'];
    $rowmovierelease = $moviequeryrow['rel_date'];
    $rowmovielang = $moviequeryrow['language'];
    $rowmoviegenre = $moviequeryrow['genre'];
    $rowmoviedirector = $moviequeryrow['director'];
    $rowmovielink = $moviequeryrow['review_link'];
    //$rowmoviecast = $moviequeryrow[''];

    $file_open = fopen(BASE_PATH . "/movie_info_files/$rowmoviename.txt", "r+");

    echo "<div>";
    echo "<form action='./modules/movies/edit_movie_process.php' method='post'>";
    echo "<table border='0'>";
    echo "<tr>";
    echo "<td>Movie name:</td>";
    echo "<td><input type='text' value='$rowmoviename' name='mov_name'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Movie release-date:</td>";
    echo "<td><input type='text' value='$rowmovierelease' name='mov_rel'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Movie language:</td>";
    echo "<td><input type='text' value='$rowmovielang' name='mov_lang'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Movie genre:</td>";
    echo "<td><input type='text' value='$rowmoviegenre' name='mov_genre'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Movie director:</td>";
    echo "<td><input type='text' value='$rowmoviedirector' name='mov_dir'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Movie review link:</td>";
    echo "<td><input type='text' value='$rowmovielink' name='mov_review'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Edit Movie Info</td>";
    echo "<td><textarea  rows='4' cols='50' name='' value=''>";
    while (!feof($file_open)) {
        echo fgets($file_open);
        echo "\n";
    }
    echo "</textarea></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan=''><input type='submit' name='editMovie' value='Update'></td>";
    echo "<td><input type='submit' name='editMovie' value='Delete'></td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
    echo "</div>";
}
?>
