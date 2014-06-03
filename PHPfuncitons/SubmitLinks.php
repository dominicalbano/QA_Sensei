<?php


    $Code = $_POST['code'];
    $Links = $_POST['linklist'];
    $OneLink = explode("\n", $Links);
      //connect to the database
      if (!mysql_connect("192.168.2.44","app_user1","") || !mysql_select_db("g5_link"))
      {
          die ('fail');    
      }
      else
      {
         //echo ('connected');
      }
  //storing variables from the form on page

  foreach ($OneLink as $value)
  {
    //$value_test = addslashes($value);
    if (mysql_query("INSERT INTO URLs VALUES('$Code', '$value')"))
    {
      //echo $value; 
    }
    else
    {
      echo "error";
    }
  }

//close connections
mysql_close(mysql_connect("192.168.2.44", "app_user1" , ""));


?>
