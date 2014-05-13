
<?php
 
 include '../../header.php';
 include_once '../../config.php';
 include_once  '../../includes/connection_final.php';
 
  $mname=$_GET['mname'];
 
 $getmovieinfo="select * from ".$prefix."_admin_movies where movie_name like '$mname'";
 $getmovieinfo_query=  mysqli_query($con, $getmovieinfo) or die(mysqli_error($con));
 
 while($info_row=  mysqli_fetch_array($getmovieinfo_query))
      {
     echo "<link rel='stylesheet' type='text/css' href= 'http://localhost/Multiplex_System/css/dropdown.css'>";
     
             $fmname=  ucfirst($info_row['movie_name']);
             $fgenre=ucfirst($info_row['genre']);
             $flanguage=$info_row['language'];
             $lang="";
             if($flanguage == "eng")
                 {
                   $lang="English";
                 }
                 else if($flanguage == "hindi")
                 {
                     $lang="Hindi";
                 }
                 else $lang="Others";
             $fdirector=ucfirst($info_row['director']);
             $frel_date=$info_row['rel_date'];
             $freviewlink=$info_row['review_link'];
             $storeinfo="";
             $minfos=fopen(BASE_PATH . "/movie_info_files/$fmname.txt","r+");
             echo "<center>";
             echo "<div id='movieinfodiv'>";
              echo " <div id='' style=''>";
             echo "<img src='../../images/$fmname.jpg' width='20%' height='35%'>";
             echo "</div>";
             echo "<div style='float=left'>";
             
             echo "<table border='1' class='fancy'>";
             echo "<tr>";
             echo "<th colspan='2'>Movie Information</th>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Movie Name:</td>";
             echo "<td>$fmname</td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Release Date:</td>";
             echo "<td>$frel_date</td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Genre:</td>";
             echo "<td>$fgenre</td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Language:</td>";
             echo "<td>$lang</td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Director:</td>";
             echo "<td>$fdirector</td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Movie Review:</td>";
             echo "<td><a href='$freviewlink'>$freviewlink</a></td>";
             echo "</tr>";
             
             
             echo "</table>";
             echo "<div>";
             echo "<h4>About the Movie:</h4>";
             echo "<texarea rows='4' col='25'>";
              while(!feof($minfos))
                 {
                  echo fgetc($minfos);
                   
                 }
                echo "</textarea>";
              echo "<div>";
              echo "</div>";
             
             echo "</div>";
            echo "</center>";
      }
    
      ?>
