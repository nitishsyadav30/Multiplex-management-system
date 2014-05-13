<style type="text/css">
    #accountcontainer
    {
        
        margin-left:35%;
        margin-right:auto;
        width:70%;
        padding: 30px;
        

    }
</style>
<div>
    <div>
        <?php
        include_once './config.php';
        include_once BASE_PATH . '/header.php';
        include_once BASE_PATH .'/includes/connection_final.php';
        ?>
    </div>
    <div>
        <?php
        $current_user = $_SESSION['CurrentUser'];
        $account_query = "select * from " . $prefix . "_register where user_email like '$current_user'";
        $result = mysqli_query($con, $account_query) or die(mysqli_error($con));
        while ($row = mysqli_fetch_array($result)) {
            $fname = $row['fname'];
            $lname = $row['lname'];
            $user_email = $row['user_email'];
            $gender = $row['gender'];
            $city = $row['city'];
            echo "<div id='accountcontainer'>";
            echo "<form action='$address/modules/admin/edituser_process.php' method='post'>";
            echo "<table border='0'>";
            echo "<th colspan='2'>";
            echo "Your Account Details";
            echo "</th>";
            echo "<tr>";
            echo "<td>First Name:</td>";
            echo "<td><input type='text' name='fname' value='$fname'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Last Name:</td>";
            echo "<td><input type='text' name='lname' value='$lname'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Email-id</td>";
            echo "<td><input type='text' name='user_email' value='$user_email'></td>";
            echo "</tr>";
            if ($gender == "Male") {
                echo "<tr>";
                echo "<td>Gender</td>";
                echo "<td><input type='radio' name='gender' id='gender' value='Male' checked='checked' />Male<input type='radio' name='gender' id='gender' value='Female'  />Female</td>";
                echo "</tr>";
            } else {
                echo "<tr>";
                echo "<td>Gender</td>";
                echo "<td><input type='radio' name='gender' id='gender' value='Male'/>Male<input type='radio' name='gender' checked='checked' id='gender' value='Female'  />Female</td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td>City</td>";
            echo "<td><select name='city' style='width:150px;'>
                                    <option selected='selected'>Select City</option>
                                    <option value='Mumbai'>Mumbai</option>
                                    <option value='Pune'>Pune</option>
                                    <option value='delhi'>Delhi</option>
                                    <option value='bangalore'>Bangalore</option>
                                    <select/></td>";
            echo "</tr>";
            echo "<tr>";
           
            echo "<td colspan=''><input type='submit' name='editUser' value='Update'></td>";
            echo "<td><input type='submit' name='editUser' value='Delete'></td>";
            echo "<td><input type='submit' name='editUser' value='Change Password'></td>";
            echo "</tr>";
            echo "</table>";
            echo "</form>";
        }
        ?>    
    </div>
</div>    