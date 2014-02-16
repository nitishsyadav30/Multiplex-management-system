<?php
 include '../../includes/connection.php';
 $city=$_POST['city'];
 echo "$city";
 $sql="insert into city values('$city')";
 if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
{
echo "City Updated";
}
?>

