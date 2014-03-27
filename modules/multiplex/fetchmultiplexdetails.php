<?php
require_once '../../config.php';
   require_once '../../includes/connection_final.php';
  $mult_name=$_REQUEST['name'];
  $mult_details_query="select * from multiplex_admin_movies where movie_name like '$mult_name'";
  $mult_query_result=  mysqli_query($con, $mult_details_query) or die(mysqli_error($con));
   while($mulqueryrow=  mysqli_fetch_array($mult_query_result))
      {
       
        $mname=$mulqueryrow['movie_name'];
        $rel_date=$mulqueryrow['rel_date'];
        $lang=$mulqueryrow['language'];
        $genre=$mulqueryrow['genre'];
        $director=$mulqueryrow['director'];
        $link=$mulqueryrow['review_link'];
        
        echo "<div>";
        
        echo "<table border='1'>";
        
        echo "<tr>";
        echo "<td>Movie name:</td>";
        echo "<td>$mname</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Release Date:</td>";
        echo "<td>$rel_date</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Language:</td>";
        echo "<td>$lang</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Director:</td>";
        echo "<td>$director</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Genre:</td>";
        echo "<td>$genre</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Review Link:</td>";
        echo "<td>$link</td>";
        echo "</tr>";
        
        echo "</table>";
        echo "</form>";
        echo "</div>";
      }  

