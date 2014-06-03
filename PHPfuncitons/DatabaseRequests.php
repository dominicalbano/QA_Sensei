<?php
session_start();
class request{

    function allgroups(){
        if(isset($db) == false){
            require_once("../PHPfunctions/DatabaseConnection.php");
            $db_class = new db_class();
            $db = $db_class->db_call();
        }

        $sql = "SELECT Group_Name, Code FROM Groups order by Time desc";
           if(!$result = $db->query($sql)){
           die('There was an error running the query [' . $db->error . ']');
           }
           return $result;
    }
    
    function ClearGroup($group_code){
        if(isset($db) == false){
            require_once("../PHPfunctions/DatabaseConnection.php");
            $db_class = new db_class();
            $db = $db_class->db_call();
        }

        $sql = "DELETE FROM  Groups WHERE Code = '$group_code';";
           if(!$result = $db->query($sql)){
           die('There was an error running the query [' . $db->error . ']');
           }
           
        $sqllink = "DELETE FROM URLs WHERE Code = '$group_code';";
           if(!$result = $db->query($sqllink)){
           die('There was an error running the query [' . $db->error . ']');
           }
    }
        
       function rightlinks(){
        if(isset($db) == false){
            require_once("../PHPfunctions/DatabaseConnection.php");
            $db_class = new db_class();
            $db = $db_class->db_call();
        }

        $sql = "SELECT Code, URL FROM URLs";
           if(!$result = $db->query($sql)){
           die('There was an error running the query [' . $db->error . ']');
           }
           return $result;
           
    }
    
    function ClearLinks($codeclear){
        if(isset($db) == false){
            require_once("../PHPfunctions/DatabaseConnection.php");
            $db_class = new db_class();
            $db = $db_class->db_call();
        }

        $sql = "DELETE FROM  URLs WHERE Code = '$codeclear';";
           if(!$result = $db->query($sql)){
           die('There was an error running the query [' . $db->error . ']');
           }
    }
    
    
    function openlinks($opencode){
        if(isset($db) == false){
            require_once("../PHPfunctions/DatabaseConnection.php");
            $db_class = new db_class();
            $db = $db_class->db_call();
        }

        $sql = "SELECT Code, URL FROM URLs WHERE Code = '$opencode';";
           if(!$result = $db->query($sql)){
           die('There was an error running the query [' . $db->error . ']');
           }
           return $result;
           
    } 
        
        
        
        
}//end request class
           
?>
