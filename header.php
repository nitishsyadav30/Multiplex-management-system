<?php session_start(); ?>
<link rel='stylesheet' type='text/css' href= 'http://localhost/Multiplex_System/css/headercss.css'>
<meta http-equiv="refresh"  url='index.php' ">
<div style="height:600px;">
    <div id="mov_table" align="center" style="">
        <img src="http://localhost/Multiplex_System/multiplex_logo.jpg" alt="logo" width="60%" height="20%" >
    </div>

    <br />
    <div id="menu" class="menu" align="center" style="margin-left: auto; background-color:#2f4f4f; ">
        <ul id="bar" class="bar">
            <?php
               
            require_once 'config.php';
            echo "<li><a id='item'class='item' href='$address/index.php'>Home</a></li>";
            echo "<li><a id='item' href=''>Book Tickets</a></li>";
            echo "<li><a id='item' href=''>Events</a></li>";
            
            if (isset($_SESSION['CurrentUser'])) {
                           
                if ($_SESSION['user_role'] =="1") {
                   
                    $wayto = "localhost://Multiplex_System/";
                    echo "<li><a id='item' href='$address/adminHome.php'>Admin Options</a></li>";
                    echo "<li><a id='item' href='$address/modules/login/logout.php' onclick='testfunction()'>Logout</a></li>";
                    echo '<li>';
                    echo "<font style='font-style: inherit; font-size:24; color:white;'>" . "Welcome ". ucfirst($_SESSION['fname']) ."\n" .ucfirst($_SESSION['lname']) . "</font>";
                    echo '</li>';
                    
                } else {
                    echo "<li><a id='item' href='$address/modules/login/logout.php'>Logout</a></li>";
                    echo "<li >";
                    echo "<font style='font-style: inherit; font-size:24;color:white;'>" . "Welcome ". ucfirst($_SESSION['fname']) ."\n" .ucfirst($_SESSION['lname']) ."</font>";
                    echo '</li>';
                
                    
                }
            } else {
                echo "<div><li><a id='itemlogin' class='loginclass' href= '$address/login.php'>Login</a></li></div>";
                echo "<li><a id='item' href='$address/registration.php'>New User?</a></li>";
                echo "<font style='font-style: inherit; font-size:24;color:white;'>Welcome Guest</font>";
               
               
            }
            ?>
        </ul>
    </div>
    <br />
