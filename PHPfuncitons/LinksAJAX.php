<?php

$Code = $_POST['code'];
$Links = $_POST['links'];
$OneLink = explode("\n", $Links);
  foreach ($OneLink as $value)
  {
        if(isset($Code, $value))
        {
        
            require_once("../Content/Links.php");    
            $linkgroup = new links();
        
            $linkgroup->generate($Code, $value);
                
            
        }
        else
        {
            echo "missing var";
        }
  }

?>
