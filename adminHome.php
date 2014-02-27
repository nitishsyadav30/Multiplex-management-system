<?php
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
        $("#multiplexselected").change(function() {
            var multi_selected = $("#multiplexselected").val();
            $.post(
                    "./modules/multiplex/multiplex_selected.php",
                    {name: multi_selected},
            function(data) {
                $("#addShowId").html(data);
            }
            );
        });
    });
</script>
<script type="text/javascript"> //to get screen Id
    $(document).ready(function(){
        $("#addscreenshow").change(function(){
            var mname=$("#addscreenmultiplex").val();
            var sno=$("#screensadded").val();
            $.post(
                    "./modules/screens/generate_screen_id.php",
                    {name:mname,no:sno},
                    function(data){
                        $("#getScreenId").html(data);
                    }
                  );
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#addscreenmultiplex").change(function() {
            var screen_multi_selected = $("#addscreenmultiplex").val();
            $.post(
                    "./modules/multiplex/multiplex_selected.php",
                    {name: screen_multi_selected},
            function(data) {
                $("#addscreenshow").html(data);
            }
            );
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#mselect").change(function() {
            $("#adminload").hide();
            $("#showmoviedetails").show();
            var selectValue = $("#mselect").val();
            //alert("Its Working"+selectValue);
            $.post(
                    "./modules/movies/edit_movies.php",
                    {name: selectValue},
            function(data) {
                $('#showmoviedetails').html(data);
            }

            );
            selectValue = "";
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#mulselect").change(function() {
            $("#showmuldetails").show();
            var getvalue = $("#mulselect").val();
            //alert("Its Working");
            $.post(
                    "./modules/multiplex/editmultiplex.php",
                    {name: getvalue},
            function(data) {
                $('#showmuldetails').html(data);
            }
            );
        });
    });
</script>
<script type="text/javascript" >
    $(document).ready(function() {
        $("#adminload").hide();
        $("#editMultiplex").hide();

        $("#addnewmovie").click(function() {
            $("#addMultiplexdiv").hide();
            $("#container").show()
            $("#adminload").show()
            $("#editMovie").hide();
            $("#demo").hide();

            $("#editMultiplex").hide();
        });
    });
</script>

<script type="text/javascript" >
    $(document).ready(function() {
        $("#editMovie").hide();

        $("#editExMovie").click(function() {
            $("#editMultiplex").hide();
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
            $("#editMultiplex").hide();
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
            $("#editMultiplex").hide();
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
        $("#editMultiplex").hide();
        $("#editMovie").hide();
        $("#demo").hide();
        $("#newadmin").click(function() {
            $("#container").show();
            $("#addAdmin").show();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#lieditmultiplex").click(function() {
            $("#addShow").hide();
            $("#adminload").hide();
            $("#editMovie").hide();
            $("#addMultiplexdiv").hide();
            $("#editMovie").hide();
            $("#demo").hide();
            $("#container").show();
            $("#addAdmin").hide();
            $("#editMultiplex").show();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#liaddScreens").click(function() {
            $("#container").show();
            $("#divaddscreens").show();

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
                        $select_movie = "select movie_name,movie_id from multiplex_admin_movies";
                        $select_result = mysqli_query($con, $select_movie);
                        echo "<select id='mselect' onselect=''>";

                        echo "<option value='' >Select Movie</option>";
                        while ($row_selected = mysqli_fetch_array($select_result)) {
                            $mid = $row_selected['movie_id'];

                            $movie = $row_selected['movie_name'];
                            echo "<option id='moption' name='$mid' value='$mid'>$movie</option>";
                        }
                        echo '</select>';
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div id="showmoviedetails" style="display: none;"></div> 

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


    <div id="editMultiplex" style="display: none;"> <!--edit multiplex info div starts here-->
        <table border="0">
            <tr><th colspan="2">Edit Multiplex</th></tr>
            <tr>
                <td>Select Multiplex</td>
                <td>
<?php
$select_multiplex = "select mul_name,mul_id from multiplex_add_multiplex";
$select_multiplex_result = mysqli_query($con, $select_multiplex);
echo "<select id='mulselect' onselect=''>";

echo "<option value='' >Select Multiplex</option>";
while ($row_selected = mysqli_fetch_array($select_multiplex_result)) {
    $mult_id = $row_selected['mul_id'];

    $mult_name = $row_selected['mul_name'];
    echo "<option id='moption' name='$mult_id' value='$mult_id'>$mult_name</option>";
}
echo '</select>';
?>
                </td>
            </tr>
        </table>
    </div> <!--edit multiplex info div ends here-->

    <div id="showmuldetails" style="display: none;"> </div>

    <div id="addShow" style="display: none;">
        <form method="post" action="">
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
$select_movie_show = "select movie_name,movie_id from multiplex_admin_movies";
$select_result_show = mysqli_query($con, $select_movie_show);
while ($row_selected = mysqli_fetch_array($select_result_show)) {
    $mid = $row_selected['movie_id'];

    $movie = $row_selected['movie_name'];
    echo "<option id='moption' name='$mid' value='$mid'>$movie</option>";
}
?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select Multiplex</td>
                    <td>
                        <select id="multiplexselected">
                            <option value="null" name="null"> Click </option>
<?php
$select_multiplex_show = "select mul_name,mul_id from multiplex_add_multiplex";
$select_mul_result_show = mysqli_query($con, $select_multiplex_show);
$mult_id = "";
while ($row_selected = mysqli_fetch_array($select_mul_result_show)) {
    $multi_id = $row_selected['mul_id'];

    $multiplex = $row_selected['mul_name'];
    echo "<option id='moption' name='$multi_id' value='$multi_id'>$multiplex</option>";
}
?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Select Screen
                    </td>
                    <td id="addShowId">

                        <select>
                            <option>Select Multiplex First</option>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td></td>
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

    <div id="divaddscreens" style="display: none;">
        <form>
            <table>
                <tr><th colspan="2">Add Screen!!</th></tr>
                <tr>
                    <td>Select Multiplex</td>
                    <td>
                        <select id="addscreenmultiplex">
                            <option value="null">Click to Select</option>
<?php
$select_multiplex_show = "select mul_name,mul_id from multiplex_add_multiplex";
$select_mul_result_show = mysqli_query($con, $select_multiplex_show);
while ($row_selected = mysqli_fetch_array($select_mul_result_show)) {
    $multi_id = $row_selected['mul_id'];

    $multiplex = $row_selected['mul_name'];
    echo "<option id='moption' name='$multi_id' value='$multi_id'>$multiplex</option>";
}
?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select Screen Number</td>
                    <td id="addscreenshow">
                        <select>
                            <option>Select Multiplex first</option>
                        </select>
                    </td>
                </tr>
                <tr>
                  
                    <td>Screen Id:</td>
                    <td id="getScreenId">
                     
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div> <!--Container Division ends here-->
