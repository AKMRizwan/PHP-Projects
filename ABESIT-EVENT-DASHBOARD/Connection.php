<?php
   $servername = 'localhost';
   $username = 'root';
   $pwd = '';
   $databasename = 'event_dash';

   $con = mysqli_connect($servername, $username, $pwd, $databasename);

   if(!$con)
      die;
   //die;
   //exit();
   
?>