<div id="indexdiv">
<?php
require_once 'config.php';
require_once  'header.php';
?>
   <link rel='stylesheet' type='text/css' href= "http://localhost/Multiplex_System/css/dropdown.css">
    <div id="dropdown">
        <select name="dbmovie" id="dbmovie" tabindex="1">
			<option value="">-- Select Movie --</option>
                        
			<optgroup label="Hindi">
				<option value="1">USA</option>
				<option value="9">Canada</option>
			</optgroup>
			<optgroup label="English">
				<option value="2">France</option>
				<option value="3">Spain</option>
				<option value="6">Bulgaria</option>
				<option value="7" disabled="disabled">Greece</option>
				<option value="8">Italy</option>
			</optgroup>
			<optgroup label="Others" >
				<option value="5">Japan</option>
				<option value="11">China</option>
			</optgroup>
			
		</select>
    </div>
   
</div>
