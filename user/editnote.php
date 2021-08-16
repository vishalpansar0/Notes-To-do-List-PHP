<?php require_once("../php/connection.php"); ?>
<?php require_once("../php/functions.php");  ?>
<?php require_once("../php/session.php");   ?>
<?php

  $r_id=$_GET['id'];

$msg="";
  $isLoggedin = confirmLogin();
  if($isLoggedin){
      $username = $_SESSION['userN'];

  }
  else{
    Redirect_to("logout.php");
  }

  $get_data = "SELECT * FROM $username WHERE id='$r_id'";
  $data = $con->query($get_data);
  $row = $data->fetch_assoc();
  $got_title = $row['title'];
  $got_text = $row['text'];

  if(isset($_POST['submit'])){
      $title = $got_title;
      $text = mysqli_real_escape_string($con,$_POST['text']);
      $type = "note";
      if(empty($text) || empty($title)){
        $msg = "Title or Text can't be empty";
      }else{
      $sql = "UPDATE $username SET text='$text'  WHERE id='$r_id'";
      if($con->query($sql) === true){
         Redirect_to("notes.php");
      }
      else{
          echo $con->error;
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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/58106dd2b0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <!-- <nav class="navbar">
        <ul>
            <li><button class = "btn btn-primary"><a href="index.php" style = "text-decoration:none;color:white;"><strong>My To Do's</strong></a></button></li>
            <li><i class="fa fa-user"></i> <?php echo $username; ?></li>
            <li> <a style="text-decoration:none;color:black;" href="logout.php">
        	    	Logout
        	    	
          	</a></li>
        </ul>
    </nav> -->
    <section class="main-section">
        <div class="notes">
        <span style="color:red"><?php echo $msg; ?></span>
        <h2>Edit :  <?php echo $got_title;?></h2>
            <div class="row">
                <form method="POST">
            <textarea class="col-12 mt-2" name="text" style="min-height:26rem;padding:1rem;" placeholder="Add Note here"><?php echo $got_text; ?></textarea>
            <button type="submit" name="submit" class="col-12 btn btn-success mt-2">Add Note</button>    
</form>
        </div>
        </div>

    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>