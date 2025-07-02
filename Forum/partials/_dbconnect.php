<?php
// Script to connect to the database
$servername="localhost";
$username="root";
$password="";
$database="idiscuss";

$conn=mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

?>