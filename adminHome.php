<?php
//session_start();
require_once './config.php';

include './includes/connection_final.php';
include './header.php';
?>
<style type="text/css">
    #mselect
    {
        width: 150px;
        height: 50px;
        display: inline-block;
        font-size: 16px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        line-height: 20px;
        padding: 3px 6px;   
    }
</style>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="css/adminHome.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    $(function() {
        $("#date").datepicker();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#mselect").change(function() {
            $("#adminload").hide();
            $("#demo").show();
            var selectValue = $("#mselect").val();
            //alert("Its Working"+selectValue);
            $.post(
                    "./modules/movies/edit_movies.php",
                    {name: selectValue},
            function(data) {
                $('#demo').html(data);
            }

            );
            selectValue = "";
        });
    });
</script>

<script type="text/javascript" >
    $(document).ready(function() {
        $("#adminload").hide();

        $("#unique").click(function() {
            $("#addMultiplexdiv").hide();
            $("#container").show()
            $("#adminload").show()
            $("#editMovie").hide();
            $("#demo").hide();

        });
    });
</script>

<script type="text/javascript" >
    $(document).ready(function() {
        $("#editMovie").hide();

        $("#editExMovie").click(function() {
            $("#addMultiplexdiv").hide();
            $("#container").show()
            $("#editMovie").show()
            $("#adminload").hide();

        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#editMovie").hide();
        $("#addMultiplexdiv").hide();

        $("#uniqueMultiplex").click(function() {
            $("#adminload").hide();
            $("#editMovie").hide();
            $("#demo").hide();
            $("#container").show();
            $("#addMultiplexdiv").show();
            $("#addShow").hide();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#uniqueShow").click(function() {
            $("#container").show();
            $("#addShow").show();
            $("#adminload").hide();
            $("#editMovie").hide();
            $("#addMultiplexdiv").hide();

            $("#editMovie").hide();
            $("#demo").hide();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
         $("#addShow").hide();
            $("#adminload").hide();
            $("#editMovie").hide();
            $("#addMultiplexdiv").hide();

            $("#editMovie").hide();
            $("#demo").hide();
        $("#newadmin").click(function() {
            $("#container").show();
            $("#addAdmin").show();
        });
    });
</script>
<?php
echo "<link rel='stylesheet' type='text/css' href='./css/menu.css' />";
include './modules/movies/admin_MenuOptions.php';
?>

<div id="container" style="display: none;">

    <div id="adminload" style="display: none;">





        <form action='./modules/movies/movie_added.php' method='post' enctype="multipart/form-data">
            <table border="0">
                <tr><th colspan="2"><center>Add New Movie</center></th></tr>
                <tr> 
                    <td>Enter Movie Id:</td><td><input type='text' name='mid'></td>
                </tr>
                <tr> 
                    <td>Enter Movie name:</td><td><input type='text' name='mname'></td>
                </tr>
                <tr><td>Enter Movie release date:</td><td><input type="text" id="date" name="rdate"></td></tr> 
                <tr><td>Enter Movie language:</td>
                    <td>
                        <select name='lang' class='lang'>
                            <option name='' value=''>Select Language</option>
                            <option name='eng' value='eng'>English</option>
                            <option name='hindi' value='hindi'>Hindi</option>
                            <option name='others' value='others'>Others</option>
                        </select>
                    </td>
                </tr>
                <tr><td>Enter Movie genre: </td>
                    <td>
                        <select name='genre' class="genre">
                            <option name='' value=''>Select Genre</option>
                            <option name='action' value='action'>Action</option>
                            <option name='adventure' value='adventure'>Adventure</option>
                            <option name='drama' value='drama'>Drama</option>
                            <option name='comedy' value='comedy'>Comedy</option>
                            <option name='doc' value='doc'>Documentary</option>
                            <option name='scf' value='scf'>Sci-Fi</option>
                            <option name='anm' value='anm'>Animation</option>
                        </select>
                    </td>
                </tr>


                <tr><td>Enter Movie director:</td><td><input type='text' name='director'> </td></tr>
                <tr><td>Enter Movie cast:</td><td><textarea rows="2" cols="25" name="cast"></textarea> </td></tr>
                <tr><td>Write Movie info:</td><td><textarea rows="4" cols="50" name="minfo" ></textarea> </td></tr>
                <tr><td>Upload Movie poster:</td><td><input type="file" name="file" id="file"></td></tr>
                <tr><td>Enter Movie Review Site:</td><td><input type='url' name='review' value="http://"> </td></tr>
                <tr><td colspan="2"><div ><center><input type='submit' name='submit' value="Add New Movie" class="button" /></center></div></td></tr>
            </table>
        </form> 



    </div>

    <div id="editMovie" style="display: none">
        <form action="" method="">
            <table border="0">
                <th colspan="2">Edit Movie</th>
                <tr>
                    <td>Select Movie</td>
                    <td>
                        <?php
                        //include './includes/connection.php';

                        $select_movie = "select mname,movie_id from admin_movie";
                        $select_result = mysql_query($select_movie, $con);
                        echo "<select id='mselect' onselect=''>";

                        echo "<option value='' >Select Movie</option>";
                        while ($row_selected = mysql_fetch_array($select_result)) {
                            $mid = $row_selected['movie_id'];

                            $movie = $row_selected['mname'];
                            echo "<option id='moption' name='$mid' value='$mid'>$movie</option>";
                        }
                        echo '</select>';
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div id="demo" style="display: none;"></div> 

    <div id="addMultiplexdiv" style="display: none;">
        <form action="./modules/multiplex/multiplex_added.php" method="post">
            <table border='0'>
                <tr>
                    <th colspan="2"><center>Add Multiplex</center></th>
                </tr>
                <tr>
                    <td>Multiplex Id</td><td><input type="text" name="mul_id"></td>
                </tr>
                <tr>
                    <td>Multiplex Name</td><td><input type="text" name="mul_name"></td>
                </tr>
                <tr>
                    <td>Multiplex City</td>
                    <td>
                        <select name="mul_city">
                            <option value="" >Select City</option>
                            <option value="pune" >Pune</option>
                            <option value="mumbai" >Mumbai</option>
                            <option value="bengaluru" >Bengaluru</option>
                            <option value="delhi" >Delhi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Multiplex Area</td><td><input type="text" name="mul_area" /></td>
                </tr>
                <tr>
                    <td>Multiplex Address</td><td><textarea rows="4" cols="20" name="mul_address"></textarea></td>
                </tr>
                <tr>
                    <td>Multiplex Screens</td>
                    <td>
                        <select name="mul_screens">
                            <option>--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>


                        </select>
                    </td>


                </tr>

                <tr><td colspan="2"><center><input type="submit" value="Click to Add" id="button"></center></td></tr>
            </table> 
        </form>
    </div>

    <div id="editMultiplex" style="display: none;">
        <table border="0">
            <tr><th colspan="2">Edit Multiplex</th></tr>
            <tr>
                <td>Select Multiplex</td>
                <td>
                    <select>
                        <option value="" name="">Click to select</option>

                    </select>
                </td>
            </tr>
        </table>
    </div>

    <div id="addShow" style="display: none;">
        <form>
            <table>
                <tr>
                    <th colspan="2"><center>Add a show!!</center></th>
                </tr>
                <tr>
                    <td>Select Movie</td>
                    <td>
                        <select>
                            <option value=""> Click </option>
                            <?php
                            $select_movie_show = "select mname,movie_id from admin_movie";
                            $select_result_show = mysql_query($select_movie_show, $con);
                            while ($row_selected = mysql_fetch_array($select_result_show)) {
                                $mid = $row_selected['movie_id'];

                                $movie = $row_selected['mname'];
                                echo "<option id='moption' name='$mid' value='$mid'>$movie</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select Multiplex</td>
                    <td>
                        <select>
                            <option value=""> Click </option>
                            <?php
                            $select_multiplex_show = "select from";
                            $select_mul_result_show = mysql_query($select_multiplex_show, $con);
                            while ($row_selected = mysql_fetch_array($select_mul_result_show)) {
                                $mul_id = $row_selected[''];

                                $multiplex = $row_selected[''];
                                echo "<option id='moption' name='' value=''>$multiplex</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div id="addAdmin" style="display: none;"> <!--add admin-->
        <form method="post" action="registration_success.php">
            <table align="center">
                <tr>
                    <td>Email ID</td>
                    <td><input type="text" class="input" name="emailId" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" class="input" name="pass" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" class="input" name="cpass" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>First Name</td>
                    <td><input type="text" class="input" name="fname"/></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Last Name</td>
                    <td><input type="text" class="input" name="lname"/></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Gender</td>
                    <td><input type="radio" name="gender" id="gender" value="m"/>Male
                        <input type="radio" name="gender" id="gender" value="f"  />Female</td>

                    <td></td>
                </tr>

                <tr>
                    <td>City</td>
                    <td><select name="city" style="width:150px;">
                            <option selected="selected">Select City</option>
                            <option value="mumbai">Mumbai</option>
                            <option value="pune">Pune</option>
                            <option value="delhi">Delhi</option>
                            <option value="bangalore">Bangalore</option>
                            <select/></td>
                    <td></td>
                </tr>






                <tr>
                    <td align="center" ><input type="reset" name="ok" id="okbtn" value="Reset" class="button"/></td>
                    <td align="center" ><input type="submit" name="ok" id="okbtn" value="Create" class="button"/></td>
                    <td></td>
                </tr>



            </table>
            </form>

    </div>
    
</div> <!--Container Division ends here-->
