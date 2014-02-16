<?php 
           require_once '../../config.php';
           include BASE_PATH.'/includes/connection.php';
           $mov_id=$_REQUEST['name'];
           //echo "$mov_id";
           $moviequery="select * from admin_movie where movie_id like '$mov_id'";
           $moviequeryresult=  mysql_query($moviequery,$con);
           while($moviequeryrow=  mysql_fetch_array($moviequeryresult))
           { 
             $rowmovieid=$moviequeryrow['movie_id'];
             $rowmoviename=$moviequeryrow['mname'];
             $rowmovierelease=$moviequeryrow['rel_date'];
             $rowmovielang=$moviequeryrow['language'];
             $rowmoviegenre=$moviequeryrow['genre'];
             $rowmoviedirector=$moviequeryrow['director'];
             $rowmovielink=$moviequeryrow['review_link'];
             
             $file_open=  fopen(BASE_PATH . "/movie_info_files/$rowmoviename.txt","r+");
             
             echo "<div>";
             echo "<table border='0'>";
             echo "<tr>";
             echo "<td>Movie Id:</td>";
             echo "<td><input type='text' value='$rowmovieid' name=''></td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Movie name:</td>";
             echo "<td><input type='text' value='$rowmoviename' name=''></td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Movie release-date:</td>";
             echo "<td><input type='text' value='$rowmovierelease' name=''></td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Movie language:</td>";
             echo "<td><input type='text' value='$rowmovielang' name=''></td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Movie genre:</td>";
             echo "<td><input type='text' value='$rowmoviegenre' name=''></td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Movie director:</td>";
             echo "<td><input type='text' value='$rowmoviedirector' name=''></td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Movie review link:</td>";
             echo "<td><input type='text' value='$rowmovielink' name=''></td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Edit Movie Info</td>";
             echo "<td><textarea  rows='4' cols='50' name='' value=''>";
             while(!feof($file_open))
                 {
                   echo fgets($file_open);
                   echo "\n";
                 }
             echo "</textarea></td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td>Change Movie Poster</td>";
             echo "<td></td>";
             echo "</tr>";
             echo "<tr>";
             echo "<td colspan='2'><center><input type='submit' value='Update'></center></td>";
             echo "</tr>";
             echo "</table>";
             echo "</div>";
           }
         ?>
