<?php
    include 'config.php';
   include 'header.php';
    include './includes/connection_final.php';
    ?>

<div id="indexdiv">
    
    <link rel='stylesheet' type='text/css' href= "http://localhost/Multiplex_System/css/dropdown.css">
    <div id="dropdown" style="float: left;">
        <form action="./modules/booking/booking_process.php" method="post">
            <table >
        <tr><td>
        <select name="dbmovie" id="dbmovie">
            <option value="">-- Select Movie --</option>


            <?php
             
            $gethindimovies = "select movie_name from multiplex_admin_movies ";
            $gethmovie = mysqli_query($con, $gethindimovies) or die(mysqli_error($con));
            while ($row_movie = mysqli_fetch_array($gethmovie)) {
                $fetchedmovie = $row_movie['movie_name'];
                echo "<option value='$fetchedmovie' >$fetchedmovie</option>";
            }
            ?>


        </select ></td></tr>
        <tr> <td> <select name="date" id="dbmovie">
            <?php
            $frommktime1 = mktime(0, 0, 0, date("m"), date("d") + 1, date("y"));
            $frommktime2 = mktime(0, 0, 0, date("m"), date("d") + 2, date("y"));
            $frommktime3 = mktime(0, 0, 0, date("m"), date("d") + 3, date("y"));
            echo "<option>  --Select Date--</option>";

            echo "<option name='date'>" . date("Y-m-d", $frommktime1) . "</option>";
            echo "<option name='date'>" . date("Y-m-d", $frommktime2) . "</option>";
            echo "<option name='date'>" . date("Y-m-d", $frommktime3) . "</option>";
            ?>
        </select><td> </tr>
        <tr><td><input type="submit" id="dbmovie" value="Continue"></td></tr>
        </table>
        </form>
    </div>
     <link rel='stylesheet' type='text/css' href= "http://localhost/Multiplex_System/css/showmovie.css">
    <div id="showmovies">
        <table class="fancy">
            <tr>
                <th>Movies Currently Running</th>
            </tr>
            <?php
          
                    
                      $getallmovies="select movie_name from multiplex_admin_movies";
                      $getallmovies_query=  mysqli_query($con, $getallmovies) or die(mysqli_error($con));
                      while($movie_gotrow=  mysqli_fetch_array($getallmovies_query))
                        {
                           echo " <tr>";
                           echo  " <td>";
                          $moviename_fetched=$movie_gotrow['movie_name'];
                          echo "<a href='./modules/movies/getMovieInfo.php?mname=$moviename_fetched'>$moviename_fetched</a>";
                        }
                    ?>
                </td>
            </tr>
                
        </table>
    </div>
</div>
