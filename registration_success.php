<!--<script>
  setTimeout(function(){
  window.location = "index.php";
}, 5000);
</script>-->
<?php
include './header.php';
include './includes/connection_final.php';

$user_role=2; //normal user 
$emailId = $_POST['emailId'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$city = $_POST['city'];

if(isset($_SESSION['CurrentUser']))
  {
    $user_role=1; //admin
  }

if ($pass != $cpass)
    {
    echo "<center><h3>Passwords Don't Match!!'</h3></center>" ;
    }
    else { $epass=  md5($pass);}
        

$sql="INSERT INTO ".$prefix."_register VALUES('$emailId','$user_role','$epass','$fname','$lname','$gender','$city')";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
{
echo "<div align='center'><h3>Registration Complete".'<br />';
echo "Redirecting You to the Login Page</h3><div>";

}


?>