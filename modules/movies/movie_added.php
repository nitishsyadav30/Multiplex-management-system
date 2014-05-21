<?php
include '../../config.php';
include '../../includes/connection_final.php';
include BASE_PATH . '/header.php';
include BASE_PATH . '/modules/movies/admin_MenuOptions.php';
//include './fileupload.php';
$movie_id=$_POST['mid'];
$mname = $_POST['mname'];

 $rdate = $_POST['rdate'];
$lang = $_POST['lang'];
$genre = $_POST['genre'];
$director = $_POST['director'];
$cast = $_POST['cast'];
$minfo = $_POST['minfo'];
$review_link=$_POST['review'];

  $sql="insert into ".$prefix."_admin_movies values('$movie_id','$mname','$rdate','$lang','$genre','$director','$review_link')";
  if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  else
  {
  echo "Movie Added";
  } 

$my_file_name = "../../movie_info_files/" . "$mname.txt";
$create_file = fopen($my_file_name, 'w') or die('Cannot Open File ' . $my_file_name);
$file_data = $minfo;
fwrite($create_file, $file_data);

//poster upload

if (isset($_POST['submit'])) {
    $allowedext = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES['file']['error']);
    $location = '../../images/';
    $extension = end($temp);
    
    
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png")) )
                    {
                       
            $_FILES["file"]["name"]=$_POST['mname'];
           // $_FILES['file']['tmp_name']=$mname;

        if ($_FILES['file']['error'] > 0) {
            echo "Error:" . $_FILES['file']['error'];
        } else {
            //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            //echo "Type: " . $_FILES["file"]["type"] . "<br>";
            //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

            if (file_exists("upload/" . $_FILES['file']['name'])) {
                echo $_FILES['file']['name'] . "already exist";
            } else {
                move_uploaded_file($_FILES['file']['tmp_name'],$location.$_FILES["file"]["name"].".jpg");
                //echo "Stored in Upload/" . $_FILES['file']['name'];
            }
        }
    } else {
        echo "Invalid File ". $_FILES['file']['error'];
    }
}
 
?>







