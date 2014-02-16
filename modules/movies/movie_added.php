<?php

include '../../includes/connection.php';

include './fileupload.php';
$movie_id=$_POST['mid'];
$mname = $_POST['mname'];
$rdate = $_POST['rdate'];
$lang = $_POST['lang'];
$genre = $_POST['genre'];
$director = $_POST['director'];
$cast = $_POST['cast'];
$minfo = $_POST['minfo'];
$review_link=$_POST['review'];

  $sql="insert into admin_movie values('$movie_id','$mname','$rdate','$lang','$genre','$director','$review_link')";
  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
  echo "Movie Updated";
  } 

$my_file_name = "../../movie_info_files/" . "$mname.txt";
$create_file = fopen($my_file_name, 'w') or die('Cannot Open File ' . $my_file_name);
$file_data = $minfo;
fwrite($create_file, $file_data);
?>







