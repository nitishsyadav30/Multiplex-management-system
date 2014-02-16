<?php
    include '../../config.php';
    include BASE_PATH . '/includes/connection.php';
    
    $mul_id=$_POST['mul_id'];
    $mul_name=$_POST['mul_name'];
    $mul_city=$_POST['mul_city'];
    $mul_area=$_POST['mul_area'];
    $mul_addr=$_POST['mul_address'];
    $mul_screens=$_POST['mul_screens'];
    
    $checktableexist="select * from ms_multiplex";
    $checkresult=  mysql_query($checktableexist,$con);
    if($checkresult != FALSE)
    {
       // echo "table exist already";
        $insert_sql="insert into ms_multiplex values('$mul_id','$mul_name','$mul_city','$mul_area','$mul_addr','$mul_screens');";
        $insert_result=  mysql_query($insert_sql,$con); 
        if($insert_result==TRUE)
            {
              
            }
            else
                {
                echo "Error:" .  mysql_error();
                }
    }
    else 
        {
          $create_table_multiplex="create table ms_multiplex(multiplex_id int(3) primary key,multiplex_name varchar(10),multiplex_city varchar(10),multiplex_area varchar(10),multiplex_address varchar(50),multiplex_screens int(3))";
          $result_create_table_multiplex=  mysql_query($create_table_multiplex,$con) or die("Error:".  mysql_error());
          echo "Table Created";
          }
?>