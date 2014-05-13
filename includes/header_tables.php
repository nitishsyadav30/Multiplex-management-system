<?php
include_once './connection_final.php';
//include_once './retrieve_variables.php';

//$header_image_table="create table ".$prefix."_header_image(image_name varchar(50),image_type varchar(25),image blob,image_size varchar(25))";

//mysqli_query($con, $header_image_table);//or die("Error: ". mysqli_error($con));

$header_navigationbar="create table ".$prefix."_header_navigation(name varchar(30), link varchar(50),id varchar(20),class varchar(20))";
mysqli_query($con, $header_navigationbar);// or die("Error: ". mysqli_error($con));

$insert_into_nav_home="insert into ".$prefix."_header_navigation values('Home','/index.php','item','item')";
$insert_into_nav_aboutus="insert into ".$prefix."_header_navigation values('Contact Us','/contactus.php','item','item')";
$insert_into_nav_login="insert into ".$prefix."_header_navigation values('Login','/login.php','item','item')";
$insert_into_nav_admin="insert into ".$prefix."_header_navigation values('Admin Options','/adminHome.php','item','item')";
$insert_into_nav_newuser="insert into ".$prefix."_header_navigation values('New User?','/registration.php','item','item')";
$insert_into_nav_contact="insert into ".$prefix."_header_navigation values('Contact Us','/contactus.php','item','item')";
$insert_into_nav_logout="insert into ".$prefix."_header_navigation values('Logout','/modules/login/logout.php','item','item')";
$insert_into_nav_account="insert into ".$prefix."_header_navigation values('Account Settings','./accountsettings.php','item','item')";

mysqli_query($con, $insert_into_nav_home);
mysqli_query($con, $insert_into_nav_aboutus);
mysqli_query($con, $insert_into_nav_login);
mysqli_query($con, $insert_into_nav_admin);
mysqli_query($con, $insert_into_nav_newuser);
mysqli_query($con, $insert_into_nav_contact);
mysqli_query($con, $insert_into_nav_logout);
mysqli_query($con, $insert_into_nav_account);


$contact_table="create table ".$prefix."_contactus(emailid varchar(100),phone1 bigint(20),phone2 bigint(20))";

if(mysqli_query($con, $contact_table))
   {
    
   }
   else
       {
        die(mysqli_errno($con));
       }