
<?php
 session_start();
 include_once '../config.php';

 $count=0;
 
 $db=$_POST['dbname'];
 $server_name=$_POST['sername'];
 $username=$_POST['username'];
 $userpass=$_POST['password'];
 $prefix =$_POST['tprefix'];

 $array=array($db,$server_name,$username,$userpass,$prefix);
 $variables=  implode(",", $array);
 $create_file=fopen('variables.php','w');
 fwrite($create_file,$variables) or die("Error Writing variables to File");
 

$db_con = mysqli_connect($server_name,$username,$userpass) or die(mysql_error());

if (mysqli_connect_errno()) {
    echo "Connection error: " . mysqli_connect_error();
}
$db_create = "create database " .$db;

if (mysqli_query($db_con, $db_create)) {
    echo "Database Created "."<br />";
}

 

$register_table = "create table ".$prefix."_register(user_email varchar(30), user_role int(3),pass varchar(300),fname varchar(10),lname varchar(10),gender varchar(8),city varchar(10),PRIMARY KEY(user_email))";

$admin_movies_table = "create table " . $prefix."_admin_movies(movie_id varchar(5) primary key,movie_name varchar(15),rel_date date,language varchar(10),genre varchar(10),director varchar(10),review_link varchar(30))";

$add_multiplex_table = "create table " . $prefix."_add_multiplex(mul_id varchar(10),mul_name varchar(12),mul_city varchar(10),mul_area varchar(10),mul_addr varchar(100),mul_screens int(10),PRIMARY KEY(mul_id))";

$add_screens_table = "create table " . $prefix."_add_screen(screen_id varchar(6) primary key,screen_no int(2),mul_id varchar(10),screen_strength int(3),balcony_seats int(3),dc_seats int(3),foreign key(mul_id) references ". "$prefix" ."_add_multiplex(mul_id))";

$add_shows_table = "create table " . $prefix."_add_show(show_id int(5) primary key AUTO_INCREMENT,movie_name varchar(15),screen_no int(2),mul_name varchar(12),show_date date,show_time time,balcony_price int(4),dc_price int(4))";

$add_booking_table = "create table " . $prefix."_booking(booking_id int(5) not null primary key AUTO_INCREMENT ,movie_name varchar(30),mul_name varchar(20),user_email varchar(30),no_of_seats int(2),mov_time time,mov_date date,total_price int(10),foreign key(user_email) references ". "$prefix" ."_register(user_email))";

$add_screen_timeslots="create table ".$prefix."_screen_timeslots(timeslot time)";



mysqli_select_db($db_con,$db) or die(mysql_error());

if (mysqli_query($db_con,$register_table))
    {
    echo "table 1 created  <br>";
    $count++;
    }
    else 
        {
          echo "Table no 1 cannot be created:" . mysqli_error($db_con)."\n"; 
       }
 
if (mysqli_query($db_con,$admin_movies_table))
    {
    echo "table 2 created  <br>";
    $count++;
    }
    else 
        {
          echo "Table no 2 cannot be created:" . mysqli_error($db_con); 
       }       
     
 if (mysqli_query($db_con,$add_multiplex_table))
    {
    echo "table 3 created  <br>";
    $count++;
    }
    else 
        {
          echo "Table no 3 cannot be created:" . mysqli_error($db_con)."<br>"; 
        }   

 if (mysqli_query($db_con,$add_screens_table))
    {
    echo "table 4 created  <br>";
    $count++;
    }
    else 
        {
          echo "Table no 4 cannot be created:" . mysqli_error($db_con)."<br>"; 
       }

 if (mysqli_query($db_con,$add_shows_table))
    {
    echo "table 5 created  <br>";
    $count++;
    
    }
    else 
        {
          echo "Table no 5 cannot be created:" . mysqli_error($db_con)."<br>"; 
       } 
 if (mysqli_query($db_con,$add_booking_table))
    {
    echo "table 6 created  <br>";
    $count++;
    
    }
    else 
        {
          echo "Table no 6 cannot be created:" . mysqli_error($db_con) ." <br />"; 
       }
    
  if (mysqli_query($db_con,$add_screen_timeslots))
    {
    echo "table 7 created  <br>";
    $count++;
    }
    else 
        {
          echo "Table no 7 cannot be created:" . mysqli_error($db_con)."\n"; 
       }
       
       if($count == 7)
       {
           $user="admin@multiplex.com";
           $pass=md5("admin123");
           $user_id="1";
           $username="topsy";
           $username1="kretts";
           $userg="m";
           $userc="Pune";
       $insert_default_admin_values="insert into " .$prefix."_register values('$user','$user_id','$pass','$username','$username1','$userg','$userc')";      
       $insert_admin_query=  mysqli_query($db_con, $insert_default_admin_values); 
       
       
       if($insert_admin_query==true)
         {
          echo "<h3 align='center'>Default Admin Created";
         } 
       }
        
         
         
          if($count)
          {        
              $date = new DateTime('09:00:00');
         for($i=0;$i<5;$i++)
         {
         
           $idate=$date->format('H:i:s');
         $insert_timeslots="insert into " .$prefix."_screen_timeslots values('$idate')";
         $insert_timeslots_query=  mysqli_query($db_con, $insert_timeslots);
         if($insert_timeslots_query == false)
             {
             mysqli_error($db_con);
             }
         else { echo  ""; }
             $date->add(new DateInterval('PT3H'));
            
             
        } 
       
          }
          if($count==7)
         {
           
             // include './header_tables.php';
         }
         
         if($count==7)
         {
           ?>
             <a href="header_tables.php">Continue Installation</a>
           <?php  
         }
  
       
         
?>
    