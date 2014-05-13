<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $(".edit").click(function(){
           $("#aboutcontainer").show();
           $("#editaboutus").show();
           
       }); 
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#filelink").click(function(){
             $("#fileinput").show();
             $("#editaboutus").hide();
             $("#fileuploaddiv").hide();
             $("#fileeditdiv").show();
        });
      });
     
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#editlink").click(function(){
             $("#fileinput").hide();
             $("#editaboutus").show();
             $("#fileuploaddiv").show();
             $("#fileeditdiv").hide();
        });
      });
     
</script>

<div id="main">
<?php
  include './header.php';
?>    
<div id="aboutedit">
    <link rel='stylesheet' type='text/css' href= './css/headercss.css'>
    <ul id="ulabout">
        <li id="liabout" class="edit"><a href="#">Edit</a>
            
        </li>
        <li id="liabout"><a href="about_us.php">Preview</a></li>
    </ul>
</div>
<?php
  
?>

    <div id="aboutcontainer" style="display:none">
    
    <div style="display:none;" id="editaboutus">
         
        <form action="" method="post">
            <table>
                <th>Edit About us</th>
                <tr><td>
                        <textarea rows="18" cols="50" style="resize: none;">
                           
                        </textarea>
                        </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Edit"></td>
                </tr>
            </table>
        </form>
    </div>
        
     <div id="fileuploaddiv">
            <ul><li id="filelink" style="list-style-type: none;"><a href="#">Or Upload a File</a></li></ul>
     </div>
        
        <div id="fileeditdiv" style="display: none;">
            <ul><li id="editlink" style="list-style-type: none;"><a href="#"> Edit File</a></li></ul>
     </div>
        
        <div id="fileinput" style="display: none; ">
            Upload a file : <input type="file"><p style="color:red;">*this will replace the current existing file</p>
        </div>
        
    <div style="display: none" id="previewaboutus">
        
    </div>
</div>

</div>
