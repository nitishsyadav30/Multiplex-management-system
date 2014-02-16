<html>
    <head>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#date").datepicker();
            });
        </script>
        
    </head>
    <body>

        <form action='movie_added.php' method='post' enctype="multipart/form-data">
            <table>
                <tr> 
                    <td>Enter Movie Id:</td><td><input type='text' name='mid'></td>
                </tr>
             <tr> 
                    <td>Enter Movie name:</td><td><input type='text' name='mname'></td>
                </tr>
                <tr><td>Enter Movie release date:</td><td><input type="text" id="date" name="rdate"></td></tr> 
                <tr><td>Enter Movie language:</td>
                    <td>
                        <select name='lang' class='lang'>
                            <option name='' value=''>Select Language</option>
                            <option name='eng' value='eng'>English</option>
                            <option name='hindi' value='hindi'>Hindi</option>
                            <option name='others' value='others'>Others</option>
                        </select>
                    </td>
                </tr>
                <tr><td>Enter Movie genre: </td>
                    <td>
                        <select name='genre' class="genre">
                            <option name='' value=''>Select Genre</option>
                            <option name='action' value='action'>Action</option>
                            <option name='adventure' value='adventure'>Adventure</option>
                            <option name='drama' value='drama'>Drama</option>
                            <option name='comedy' value='comedy'>Comedy</option>
                            <option name='doc' value='doc'>Documentary</option>
                            <option name='scf' value='scf'>Sci-Fi</option>
                            <option name='anm' value='anm'>Animation</option>
                        </select>
                    </td>
                </tr>
                 
                
                <tr><td>Enter Movie director:</td><td><input type='text' name='director'> </td></tr>
                <tr><td>Enter Movie cast:</td><td><textarea rows="2" cols="25" name="cast"></textarea> </td></tr>
                <tr><td>Write Movie info:</td><td><textarea rows="4" cols="50" name="minfo" ></textarea> </td></tr>
                <tr><td>Upload Movie poster:</td><td><input type="file" name="file" id="file"></td></tr>
               <tr><td>Enter Movie Review Site:</td><td><input type='url' name='review' value="http://"> </td></tr>
                <tr><td> <input type='submit' name='submit' value="Add New Movie"></td></tr>
        </form> 

    </table>
</body>
</html>