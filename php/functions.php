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

function confirmLogin(){
  if(isset($_SESSION['userN'])){
    return true;
  }
  else{
    return false;
  }
}

function createUser($username){
  Global $con;
  $sql = "CREATE TABLE $username(id int(2) auto_increment primary key,type char(10),title varchar(30),text LONGTEXT)";
  $con->query($sql); 
}
?>