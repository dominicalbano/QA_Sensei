<?php

class db_class{

   public function db_call(){
            
        $db =  new mysqli("192.168.2.44","app_user1","","g5_link");
        if ($db->connect_errno) {
        echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        
 
        return $db;
    }
}
?>
