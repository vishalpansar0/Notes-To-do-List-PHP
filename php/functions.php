<?php
 function Redirect_to($New_Location)
 {
   header("Location:".$New_Location);
   exit;	
 }

 function check($uname){
     Global $con;
     $sql = "SELECT * FROM users WHERE username='$uname' LIMIT 1";
     $result = $con->query($sql);
     if ($result->num_rows > 0) {
        return true;
      } 
      else{
          return false;
      }
 }

 function login($userN,$pass){
    Global $con;
    $sql = "SELECT * FROM users WHERE username='$userN' AND password='$pass' LIMIT 1";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
       return true;
     } 
     else{
         return false;
     }
 }
?>