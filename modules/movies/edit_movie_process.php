<?php

include_once '../../config.php';
include_once BASE_PATH . '/includes/connection_final.php';
include_once BASE_PATH . '/header.php';
$movie_name = $_POST['mov_name'];
$rdate = $_POST['mov_rel'];
$lang = $_POST['mov_lang'];
$genre = $_POST['mov_genre'];
$director = $_POST['mov_dir'];
//$cast = $_POST['cast'];
//$minfo = $_POST['minfo'];
$review_link=$_POST['mov_review'];
if ($_REQUEST['editMovie'] == "Update") {
    
    $update_movie="update ".$prefix."_admin_movies set movie_name = '$movie_name',rel_date = '$rdate', language = '$lang', genre = '$genre', director ='$director', review_link ='$review_link' where movie_name like '$movie_name'";
    if(mysqli_query($con, $update_movie))
       {
        echo "<h3>Movie Updated Successfully!!</h3>";
       }
       else { mysqli_error($con);}
} else {
    $delete_string = "delete from " . $prefix . "_admin_movies where movie_name like '$movie_name'";
    if (mysqli_query($con, $delete_string)) {

        $file_to_delete = BASE_PATH . "/images/" . $movie_name . ".jpg";
        if (is_file($file_to_delete)) {
            (unlink($file_to_delete));
        }
        $file_to_delete = BASE_PATH . "/movie_info_files/" . $movie_name . ".txt";
        if (is_file($file_to_delete)) {
            (unlink($file_to_delete));
        }
        echo '<h3>Movie Successfully Deleted</h3>';

        // Header("Location: $address/index.php");
    } else {
        mysqli_error($con);
    }
}
