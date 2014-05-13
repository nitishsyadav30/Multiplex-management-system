<script type="text/javascript">
    function myFunction() {
    var pass1 = document.getElementById("newpass1").value;
    var pass2 = document.getElementById("newpass2").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("newpass1").style.borderColor = "#E34234";
        document.getElementById("newpass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
       // alert("Passwords Match!!!");
        document.getElementById("regForm").submit();
    }
    return ok;
}
</script> 
<?php

include_once '../../config.php';
include_once BASE_PATH . '/includes/connection_final.php';
include_once BASE_PATH . '/includes/retrieve_variables.php';
include_once BASE_PATH . '/header.php';
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $user_email=$_POST['user_email'];
        $gender=$_POST['gender'];
        $city=$_POST['city'];
if ($_REQUEST['editUser'] == "Update") 
    {
      $update_string = "update " . $prefix . "_register set fname = '$fname',lname = '$lname', user_email = '$user_email', gender = '$gender', city ='$city' where user_email like '$user_email'";
       if (mysqli_query($con, $update_string)) {
        echo "<center><h3>User Updated Successfully!!</h3></center>";
    } else {
        mysqli_error($con);
    }
} else if($_REQUEST['editUser'] == "Delete") {
    $delete_string = "delete from " . $prefix . "_register where user_email like ''";
    if (mysqli_query($con, $delete_string)) {

        echo '<h3>Movie Successfully Deleted</h3>';

        // Header("Location: $address/index.php");
    } else {
        mysqli_error($con);
    }
}
else
    {
     ?>
<form action="./changepassword_process.php" method="post" id="regform" >
    <table>
        <th>
        <td colspan="2">Change Password</td>
        </th>
        <tr>
            <td>Type Old Password</td>
            <td><input type="password" name="oldpass"></td>
        </tr>
        <tr>
            <td>Type New Password</td>
            <td><input type="password" name="newpass1" id="newpass1"></td>
        <tr>
            <td>Confirm New Password</td>
            <td><input type="password" name="newpass2" id="newpass2"></td>
        </tr>
        </tr>
        <tr>
            <td><center><input type="submit" value="Change" onclick="return myFunction()"></center></td>
        </tr>
    </table>
</form>
<?php
    }

