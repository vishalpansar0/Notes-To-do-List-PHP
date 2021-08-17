<?php require_once("php/connection.php"); ?>
<?php require_once("php/session.php"); ?>
<?php require_once("php/functions.php"); ?>
<?php

$isLoggedin = confirmLogin();
if($isLoggedin){
    Redirect_to("user/");
}


 $errorMsg=null;
   if(isset($_POST['submit'])){
       $username = mysqli_real_escape_string($con,$_POST['username']);
       $password = mysqli_real_escape_string($con,$_POST['password']);

       if(empty($username) || empty($password)){
           $errorMsg = "Username or password is empty";
       }
       else{
           $ifexists = check($username);
           if($ifexists){
               $errorMsg = "User Already Exists, Please Log In";
           }

           else{
               $sql = "INSERT INTO users (username,password) VALUES('$username','$password')";
               
               if ($con->query($sql) === TRUE) {

                createUser($username);
                  
              }
               $_SESSION["userN"] = $username;
               Redirect_to("user/");
           }
       }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My NoteBook | SignUp</title>
    <link rel="icon" href="icon.png" type="image/x-icon">  
    <link rel="stylesheet" href=css/style.css>
    <script src="https://kit.fontawesome.com/58106dd2b0.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <h4> My Notebook</h4>
    </nav>
    <section class="main-section">
    <div class="card">
    
            <h2 class="card-heading">Sign Up</h2><br>
         <form  method="post">
          <label for="username">Username</label><br>
          <input type="text" id="username" name="username" placeholder="Username"><br><br>
          <label for="lname">Password</label><br>
          <input type="password" id="password" name="password" placeholder="Password"><br><br>
          <button type="submit" name ="submit" class="submit-btn">Sign Up</button><br><br><a href="index.php">Already have an account?<br> Log In here!</a>
        </form>
        <br><span style="color:red"><?php
	
		echo $errorMsg;
	  
	  ?></span>
        </div>

        

    </section>
    

<script src="js/script.js"></script>
</body>
</html>