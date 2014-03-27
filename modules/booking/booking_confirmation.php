<?php
 session_start();
 
$getmoviebooked=$_POST['bookt'];
$usermail=$_SESSION['CurrentUser'];
?>
<form>
    <table>
        <tr>
            <td>Movie Name:</td>
           <?php echo "<td>$getmoviebooked</td>"; ?> 
        </tr>
        <tr>
            <td>User email:</td>
           <?php echo "<td>$usermail</td>"; ?> 
        </tr>
        <tr>
            <td>Number Of People</td>
            <td><input type="text" name="nop" min="1" max="2"></td>
        </tr>
            
    </table>
</form>
