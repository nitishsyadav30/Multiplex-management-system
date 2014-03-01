 <?php
define ('BASE_PATH',dirname(realpath(__FILE__)));
$host="localhost";
$user="nitish";
$public_replace_string="/home/$user/public_html/";
$public_windows_string='C:/wamp/www/Multiplex_System//';
$localhost_replace_string="/var/www/";
$multiplex_name="Multiplex Management System";
$string= BASE_PATH;



    if (strpos($string,"public_html")==true)
    {
        $address=trim(substr_replace("$string","http://localhost/~$user/",0,strlen($public_replace_string)));
        define ('main',$address . '/');
           
    }
    if(strpos($string, "wamp") == true){
         $address=trim(substr_replace("$string","http://localhost/Multiplex_System",0,strlen($public_windows_string)));
          define ('main',$address . '/');
        
    }
    else
    {
        $address=substr_replace("$string","http://192.168.85.128/",0,strlen($localhost_replace_string));
        define ('main',$address . '/');
        
    }
  
    function movieImgAddress($imgLocation)
    {
        global $user, $public_replace_string, $localhost_replace_string;
        if (strpos($imgLocation,"public_html")==true)
            return trim(substr_replace("$imgLocation","http://localhost/~$user/",0,strlen($public_replace_string)));
		if(strpos($string, "wamp") == true)
			return trim(substr_replace("$string","http://localhost/Multiplex_System",0,strlen($public_windows_string)));
        else
        {
            $imghref=substr_replace("$imgLocation","http://192.168.0.105/",0,strlen($localhost_replace_string));
            return $imghref;
            
        }
    }
?>
