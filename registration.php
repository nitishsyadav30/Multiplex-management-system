<html>
    <head>
        <title>Register Here!!</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
        <script type="text/javascript">
            function checkPassword()
            {
                var pass=document.getElementById("pass").value;
                var cpass=document.getElementById("cpass").value;
                if(pass==null)
                {
                    alert("Enter password First");
                }
                if(cpass==null)
                {
                    alert("Enter confirm password ");
                }
                if(pass==cpass)
                {}
                else
                {
                    alert("Passwords Dont Match");
                }
            }
        </script>
    </head>
     
    <body>
       <?php
        include './header.php';
        ?>
        <br />
        <form action="registration_success.php" method="post">
            <div align="center" class="centerdiv" >

                <h3 align="center">New User Registration</h3>
                <form method="post" action="includes/registeration_success.php">
                    <table align="center" >
                        <tr>
                            <td>Email ID</td>
                            <td><input type="text" class="input" name="emailId" /></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Password</td>
                            <td><input type="password" class="input" name="pass" id="pass"/></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Confirm Password</td>
                            <td><input type="password" class="input" name="cpass" id="cpass"  /></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>First Name</td>
                            <td><input type="text" class="input" name="fname"/></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Last Name</td>
                            <td><input type="text" class="input" name="lname"/></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Gender</td>
                            <td><input type="radio" name="gender" id="gender" value="Male"/>Male
                                <input type="radio" name="gender" id="gender" value="Female"  />Female</td>

                            <td></td>
                        </tr>

                        <tr>
                            <td>City</td>
                            <td><select name="city" style="width:150px;">
                                    <option selected="selected">Select City</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Pune">Pune</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Bangalore">Bangalore</option>
                                    <select/></td>
                            <td></td>
                        </tr>



                        


                        <tr>
                            <td align="center" ><input type="reset" name="ok" id="okbtn" value="Reset" class="button"/></td>
                            <td align="center" ><input type="submit" name="ok" id="okbtn" value="Create" class="button"/></td>
                            <td></td>
                        </tr>



                    </table>
            </div>
                </form>  
                </body>
                </html>