<div id="indexdiv">
<?php
require_once 'config.php';
require_once  'header.php';
?>
   <link rel='stylesheet' type='text/css' href= "http://localhost/Multiplex_System/css/dropdown.css">
   <div id="dropdown" style="float: left;">
        <select name="dbmovie" id="dbmovie" tabindex="1">
			<option value="">-- Select Movie --</option>
                        
			<optgroup label="Hindi">
				<?php
                                 include './includes/connection_final.php';
                                  $gethindimovies="select movie_name from multiplex_admin_movies where language like 'hindi' ";
                                  $gethmovie=mysqli_query($con, $gethindimovies);
                                  while($row_movie= mysqli_fetch_array($gethmovie))
                                    {
                                      $fetchedmovie=$row_movie['movie_name'];
                                      echo "<option value='$fetchedmovie' name='$fetchedmovie'>$fetchedmovie</option>";
                                    }
                                ?>
			</optgroup>
			<optgroup label="English">
				<?php
                                  $getengmovies="select movie_name from multiplex_admin_movies where language like 'eng' ";
                                  $getemovie=mysqli_query($con,$getengmovies);
                                  while($row_emovie= mysqli_fetch_array($getemovie))
                                    {
                                      $fetchedemovie=$row_emovie['movie_name'];
                                      echo "<option value='$fetchedmovie' name='$fetchedemovie'>$fetchedemovie</option>";
                                    }
                                ?>
			</optgroup>
			<optgroup label="Others" >
				<?php
                                  $getothersmovies="select movie_name from multiplex_admin_movies where language like 'others' ";
                                  $getothersmovie=mysqli_query($con,$getothersmovies);
                                  while($row_othersmovie= mysqli_fetch_array($getothersmovie))
                                    {
                                      $fetchedomovie=$row_othersmovie['movie_name'];
                                      echo "<option value='$fetchodmovie' name='$fetchedomovie'>$fetchedomovie</option>";
                                    }
                                ?>
			</optgroup>
			
		</select>
    </div>
   <link rel='stylesheet' type='text/css' href= '$string/css/showmovies.css'>
   <div id="showmovies">
       <div>
           <table border="1">
               <tr></tr>
           </table>
       </div>
   </div>
</div>
