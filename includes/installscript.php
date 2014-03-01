<?php

$db=$_POST['dbname'];
$server_name=$_POST['sername'];
$username=$_POST['username'];
$userpass=$_POST['password'];
$prefix =$_POST['tprefix']; ;
$db_con = mysqli_connect($server_name,$username,$userpass);
if (mysqli_connect_errno()) {
    echo "Connection error: " . mysqli_connect_error();
}
$db_create = "create database multiplex_management";

if (mysqli_query($db_con, $db_create)) {
    echo "Database Created";
}

 

$register_table = "create table ".$prefix."register(user_email varchar(30), user_role int(3),pass varchar(20),fname varchar(10),lname varchar(10),gender varchar(8),city varchar(10),PRIMARY KEY(user_email))";
$admin_movies_table = "create table " . $prefix . "admin_movies(movie_id varchar(5) primary key,movie_name varchar(15),rel_date datetime,language varchar(10),genre varchar(10),director varchar(10),review_link varchar(30))";
$add_multiplex_table = "create table " . $prefix . "add_multiplex(mul_id varchar(10),mul_name varchar(12),mul_city varchar(10),mul_area varchar(10),mul_addr varchar(100),mul_screens int(10),PRIMARY KEY(mul_id))";
$add_screens_table = "create table " . $prefix . "add_screen(screen_id varchar(6) primary key,screen_no int(2),mul_id varchar(10),screen_strength int(3),balcony_seats int(3),dc_seats int(3),foreign key(mul_id) references ". "$prefix". "add_multiplex(mul_id))";
$add_shows_table = "create table " . $prefix . "add_show(show_id int(5) primary key,screen_id varchar(6),mul_id varchar(10),show_date datetime,show_time datetime,foreign key(mul_id) references " ."$prefix" . "add_multiplex(mul_id),foreign key(screen_id) references " . "$prefix". "add_screen(screen_id))";
$add_booking_table = "create table " . $prefix . "booking(booking_id int(5),movie_id varchar(5),user_email varchar(30),show_id int(5),screen_id varchar(6),no_of_seats int(2),seat_no int(2),mov_time datetime,foreign key(user_email) references " ."$prefix". "register(user_email),foreign key(movie_id) references " ."$prefix". "admin_movies(movie_id),foreign key(show_id) references " ."$prefix"."add_show(show_id),foreign key(screen_id) references " ."$prefix"."add_screen(screen_id))";

mysqli_select_db($db_con,'multiplex_management') or die(mysql_error());

if (mysqli_query($db_con,$register_table))
    {
    echo "table 1 created  <br>";
    }
    else 
        {
          echo "Table no 1 cannot be created:" . mysqli_error($db_con)."\n"; 
       }
 $insert_default_admin_values="insert into ";      
       
if (mysqli_query($db_con,$admin_movies_table))
    {
    echo "table 2 created  <br>";
    }
    else 
        {
          echo "Table no 2 cannot be created:" . mysqli_error($db_con); 
       }       
     
 if (mysqli_query($db_con,$add_multiplex_table))
    {
    echo "table 3 created  <br>";
    }
    else 
        {
          echo "Table no 3 cannot be created:" . mysqli_error($db_con)."\n"; 
        }   

 if (mysqli_query($db_con,$add_screens_table))
    {
    echo "table 4 created  <br>";
    }
    else 
        {
          echo "Table no 4 cannot be created:" . mysqli_error($db_con)."\n"; 
       }

 if (mysqli_query($db_con,$add_shows_table))
    {
    echo "table 5 created  <br>";
    }
    else 
        {
          echo "Table no 5 cannot be created:" . mysqli_error($db_con)."\n"; 
       } 
 if (mysqli_query($db_con,$add_booking_table))
    {
    echo "table 6 created  <br>";
    }
    else 
        {
          echo "Table no 6 cannot be created:" . mysqli_error($db_con)."\n"; 
       }
?>

