<?php 
    include '../config.php';
    //include BASE_PATH .'/includes/connection.php';
    $prefix="multiplex_";
    $db_con=  mysqli_connect("localhost","multiplex","multiplex123");
    if(mysqli_connect_errno())
    {
        echo "Connection error: " . mysqli_connect_error();
    }
    $db_create="create database multiplex_management";
    
    if(mysqli_query($db_con,$db_create))
      {
        echo "Congrats man";
      }
      
          
    $register_table="create table". $prefix ."register(user-email varchar(30) primary key,user_roll int(3),pass varchar(20),fname varchar(10),lname varchar(10),gender varchar(8),city varchar(10))";
    $admin_movies_table="create table" .$prefix."admin_movies(movie_id varchar(5) primary key,movie_name varchar(15),rel_date datetime,language varchar(10),genre varchar(10),director varchar(10),review_link varchar(30))";
    $add_multiplex_table="create table".$prefix."add_multiplex(mul_id varchar(10) primary key,mul_name varchar(12),mul_city varchar(10),mul_area varchar(10),mul_addr varchar(100),mul_screens int(10)";
    $add_screens_table="create table".$prefix."add_screen(screen_id varchar(6) primary key,screen_no int(2),mul_id varchar(10),screen_strength int(3),balcony_seats int(3),dc_seats int(3),foreign key(mul_id) references .'$prefix'.add_multiplex(mul_id))";
    
    $add_shows_table="create table". $prefix."add_show(show_id int(5) primary key,screen_id varchar(6),mul_id varchar(10),show_date datetime,show_time datetime,'foreign key(mul_id) references' .'$prefix'.'add_multiplex(mul_id)','foreign key(screen_id) references' .$prefix.'add_screen(screen_id)')";
    
    $add_booking_table="create table".$prefix."booking(booking_id int(5),movie_id varchar(5),user-email varchar(30),show_id int(5),screen_id varchar(6),movie_id varchar(5),no_of_seats int(2),seat_no int(2))";
    ?>

