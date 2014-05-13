<?php
 session_start();
 
 include_once  dirname(realpath(__FILE__)).'/config.php';
include_once  BASE_PATH.'/includes/connection_final.php';
echo "<link rel='stylesheet' type='text/css' href= '$address/css/headercss.css'>";
?>
<div id="mov_table" align="center" style="">
        <?php
        echo "<img src='$address/images/multiplex_logo.jpg' alt='logo' width='60%' height='20%' >";
        if (isset($_SESSION['CurrentUser'])) {

        if ($_SESSION['user_role'] == "1") {
             echo "<form action='$address/changeheader.php' method='post' enctype='multipart/form-data'>";
             echo "Change Header Image:<input type='file' name='file' id='file' />";
             echo "<input type='submit' name='submit' value='submit' />";
             echo "</form>";
         }
       }
        ?>
    </div>
     <br />
<?php
    
$select_menu_items="select * from ".$prefix."_header_navigation";
$result_menu_items=  mysqli_query($con, $select_menu_items) or die();
$column=array();
while($row=mysqli_fetch_array($result_menu_items))
     {
      $column[]=$row['name'];
     }
?>

<?php
//include_once  './includes/connection_final.php';
 $select_menu_items="select name from ".$prefix."_header_navigation";
$result_menu_items=  mysqli_query($con, $select_menu_items) or die();
$column_name=array();
while($row=mysqli_fetch_array($result_menu_items))
     {
      $column_name[]=$row['name'];
     }
    
     $home_name=$column_name[0];
     //$aboutus_name=$column_name[1];
     $login_name=$column_name[1];
     $admin_name=$column_name[2];
     $newuser_name=$column_name[3];
     $contact_name=$column_name[4];
     $logout_name=$column_name[5];
     $account_name=$column_name[6];
   
  
 $select_menu_link="select link from ".$prefix."_header_navigation";
$result_menu_link=  mysqli_query($con, $select_menu_link) or die();
 $column_link=array();
while($row=mysqli_fetch_array($result_menu_link))
     {
      $column_link[]=$row['link'];
     }
    
     $home_link=$column_link[0];
    // $aboutus_link=$column_link[1];
     $login_link=$column_link[1];
     $admin_link=$column_link[2];
     $newuser_link=$column_link[3];
     $contact_link=$column_link[4];
     $logout_link=$column_link[5];
     $account_link=$column_link[6];
 ?>

<div id="maindiv" style="">
     
    <div id="menu" class="menu" align="center" style=" background-color:#2f4f4f; ">
        <ul id="bar" class="bar">
            <?php
            echo "<li><a id='item'class='item' href='$address$home_link'>$home_name</a></li>";
           
            

            if (isset($_SESSION['CurrentUser'])) {

                if ($_SESSION['user_role'] == "1") {

                    $wayto = "localhost://Multiplex_System/";
                    
                    echo "<li><a id='item' href='$address$account_link'>$account_name</a></li>";
                    echo "<li><a id='item' href='$address$admin_link'>$admin_name</a></li>";
                    echo "<li><a id='item' href='$address$logout_link'>$logout_name</a></li>";
                    echo "<li><a id='item' href='$address$contact_link'>$contact_name</a></li>";
                    echo '<li>';
                    echo "<font style='font-style: inherit; font-size:24; color:white;'>" . "Welcome " . ucfirst($_SESSION['fname']) . "\n" . ucfirst($_SESSION['lname']) . "</font>";
                    echo '</li>';
                } else {
                    
                    echo "<li><a id='item' href='$address$account_link'>$account_name</a></li>";
                    echo "<li><a id='item' href='$address$logout_link'>$logout_name</a></li>";
                    echo "<li><a id='item' href='$address$contact_link'>$contact_name</a></li>";
                    echo "<li >";
                    echo "<font style='font-style: inherit; font-size:24;color:white;'>" . "Welcome " . ucfirst($_SESSION['fname']) . "\n" . ucfirst($_SESSION['lname']) . "</font>";
                    echo '</li>';
                }
                
            } else {
                
                echo "<div><li><a id='itemlogin' class='loginclass' href= '$address$login_link'>$login_name</a></li></div>";
                echo "<li><a id='item' href='$address$newuser_link'>$newuser_name</a></li>";
                echo "<li><a id='item' href='$address$contact_link'>$contact_name</a></li>";
                echo "<li><font style='font-style: inherit; font-size:24;color:white;'>Welcome Guest</font></li>";
            }
            
            ?>
        </ul>
    </div>
    <br />
</div>
