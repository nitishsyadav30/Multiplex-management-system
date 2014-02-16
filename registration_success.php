<script>
  setTimeout(function(){
  window.location = "index.php";
}, 5000);
</script>
<?php
include './header.php';
include './includes/connection.php';

$uname = $_POST['uname'];
$emailId = $_POST['emailId'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];

if ($pass != $cpass)
    {
echo "<script >
        setTimeout(function() {
            window.location = 'registration.php';
        }, 5000);
</script>";
      die("Passwords Dont match");
}

$sql="INSERT INTO register VALUES('$uname','$emailId','$pass','$fname','$lname','$gender','$city','$mobile')";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
{
echo "Registration Complete".'<br />';
echo "Redirecting You to the Login Page";

}


?>