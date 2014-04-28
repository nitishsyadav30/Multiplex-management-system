<html>
<head>
    <title>
        Logout
    </title>
</head>
   
<body>
       <?php
           require_once '../../config.php';

          session_start();
        //$_SESSION['valid_id']="un";
         
        if(session_destroy())
        {
        Header("Location:../../index.php");
        }
       ?>
    <br />
        <div align="center" class="centerdiv" style="width: 1000px; ">
        <h2>You have been Logged Out..!!!</h2>
          
        </div>
        </div>
    </body>
</html>
