<?php// include_once '../header.php'; ?>
<html>
    <head>
        <title>Getting Your Product Ready</title>
    </head>
    <body>
        <form action="installscript.php" method="post">
            <table>
                <tr>
                    <th colspan="2">Connecting to Database</th>
                </tr>
                <tr>
                    <td>Database Name</td>
                    <td><input type="text" name="dbname"></td>
                </tr>
                <tr>
                    <td>Server to Connect To</td>
                    <td><input type="text" name="sername"></td>
                </tr>
                <tr>
                    <td>User name</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password for user</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Table Prefix</td>
                    <td><input type="text" name="tprefix"></td>
                    <td style="color: red;">*Preferred entry is only text</td>
                </tr>
                <tr>
                    <td colspan="2"><center><input type="submit"></center></td>
                </tr>
            </table>
        </form>
    </body>
</html>
   

