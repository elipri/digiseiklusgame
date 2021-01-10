<?php
   $dbhost = 'tigu.hk.tlu.ee';
   $dbuser = 'kerttusepp';
   $dbpass = 'EIo7b7ke';
   $dbname = 'kerttusepp';
  
   //Create database connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
   
?>
