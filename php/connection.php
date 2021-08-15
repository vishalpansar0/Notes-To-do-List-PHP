<?php

$server="localhost";
$username="root";
$pass="";
$db ="notestodo";
$con=new mysqli($server,$username,$pass,$db);
if($con->connect_error)
   {
	   echo"Connection Error".$con->connect_error;
   }
?>