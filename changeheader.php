<?php
include_once './config.php';
include './header.php';
if (isset($_POST['submit'])) {
    if (isset($_FILES['file'])) {
    $allowedext = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES['file']['error']);
    $location = BASE_PATH.'/images/';
    $extension = end($temp);
    
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png")) )
                    {
                       $extension = end(explode('.', $_FILES['file']['name']));
            $_FILES["file"]["name"]="multiplex_logo.".$extension;
           // $_FILES['file']['tmp_name']=$mname;

        if ($_FILES['file']['error'] > 0) {
            echo "Error:" . $_FILES['file']['error'];
        } else {
            //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            //echo "Type: " . $_FILES["file"]["type"] . "<br>";
            //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

            if (file_exists("upload/" . $_FILES['file']['name'])) {
                 unlink($location.$_FILES['file']['name']) ;
                  move_uploaded_file($_FILES['file']['tmp_name'],$location.$_FILES["file"]["name"]);
                  
                 
            } else {
                move_uploaded_file($_FILES['file']['tmp_name'],$location.$_FILES["file"]["name"]);
                //echo "Stored in Upload/" . $_FILES['file']['name'];
            }
        }
    } else {
        echo "Invalid File ". $_FILES['file']['error'];
    }
}
 
}
