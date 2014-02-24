<html>
    <head>
        <title>Register Here!!</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
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
                            <td><input type="password" class="input" name="pass" /></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Confirm Password</td>
                            <td><input type="password" class="input" name="cpass" /></td>
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
                            <td><input type="radio" name="gender" id="gender" value="m"/>Male
                                <input type="radio" name="gender" id="gender" value="f"  />Female</td>

                            <td></td>
                        </tr>

                        <tr>
                            <td>City</td>
                            <td><select name="city" style="width:150px;">
                                    <option selected="selected">Select City</option>
                                    <option value="mumbai">Mumbai</option>
                                    <option value="pune">Pune</option>
                                    <option value="delhi">Delhi</option>
                                    <option value="bangalore">Bangalore</option>
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