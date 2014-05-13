<script type="text/javascript">
    function calPrice()
    {
        var price = document.getElementById("price").value;
        var nop = document.getElementById("nop").value;
        document.getElementById("tprice").value=price*nop;
          
        
        
    }
</script>
<?php
 
 include_once '../../header.php';
 include '../../includes/connection_final.php';
 
$getmoviebooked=@$_POST['bookt'];
$usermail=$_SESSION['CurrentUser'];
if($getmoviebooked=="")
    {
     die("<center><h3>Please Select a Show<h3></center>");
    }
    $variables=  explode(".", $getmoviebooked);
    $showdate= $variables[0];
    $showtime= $variables[1];
    $mul_name= $variables[2];
    $movie_name= $variables[3];
    $balcony_price= $variables[4];
    $dc_price= $variables[5];
?>
<form action="./bookingpayment.php" method="post">
    <table>
        <tr>
            <td>Movie Name:</td>
           <?php echo "<td><input type='text' name='movie_name' value='$movie_name' readonly></td>"; ?> 
        </tr>
        <tr>
            <td>Multiplex Name:</td>
           <?php echo "<td><input type='text' name='mul_name' value='$mul_name' readonly></td>"; ?> 
        </tr>
        <tr>
            <td>Show Date:</td>
           <?php echo "<td><input type='text' name='showdate' value='$showdate' readonly></td>"; ?> 
        </tr>
        <tr>
            <td>Show Time:</td>
           <?php echo "<td><input type='text' name='showtime' value='$showtime' readonly></td>"; ?> 
        </tr>
        <tr>
            <td>User email:</td>
           <?php echo "<td><input type='text' name='useremail' value='$usermail' readonly></td>"; ?> 
        </tr>
        <tr>
            <td>Select Price</td>
            <td><select id="price" name="price">
                    <?php
                  echo " <option>Price</option>";
                   echo "<option name='bal' value='$balcony_price'>Balcony $balcony_price</option>";
                    echo "<option name='dc' value='$dc_price'>Dc $dc_price</option>";
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Number Of People</td>
            <td><select name="nop" id="nop" onchange="calPrice()">
                    <option name="" value="">Select</option>
                    <option name="1" value="1">1</option>
                    <option name="2" value="2">2</option>
                    <option name="3" value="3">3</option>
                    <option name="4" value="4">4</option>
                    <option name="5" value="5">5</option>
                </select></td>
        </tr>
        <tr>
            <td>Total Price of Tickets:</td>
            <td><input type="text" name="tprice" id="tprice" readonly></td>
        </tr>   
        <tr>
            <td colspan=""><input type="submit" name="booking" value="Proceed To Payment"></td>
            <td colspan=""><input type="submit" name="booking" value="Cancel Booking"></td>
        </tr>
    </table>
</form>
