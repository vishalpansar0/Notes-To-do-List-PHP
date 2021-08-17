<?php require_once("../php/connection.php"); ?>
<?php require_once("../php/functions.php");  ?>
<?php require_once("../php/session.php");   ?>
<?php
$msg="";
  $isLoggedin = confirmLogin();
  if($isLoggedin){
      $username = $_SESSION['userN'];


  }
  else{
    Redirect_to("logout.php");
  }
  if(isset($_POST['submit'])){
      $text = mysqli_real_escape_string($con,$_POST['textarea']);
      $type = "todo";
      $title="";
      if(empty($text)){
           $msg = "Text can't be empty";
      }else{
      $sq = "INSERT INTO $username(type,title,text) VALUES('$type','$title','$text')";
      if($con->query($sq) === true){
         // $msg = "Added successfully";
      }
    }

  }

  if(isset($_POST['subm'])){
      $del_id = $_POST['subm'];
      $s = "DELETE FROM $username WHERE id='$del_id'";
      $con->query($s);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To Do's</title>
    <link rel="icon" href="../icon.png" type="image/x-icon">  
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/58106dd2b0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="notes.php" style = "text-decoration:none;color:white;"><button class = "btn btn-primary"><strong>My Notes</strong></button></a></li>
            <li><i class="fa fa-user"></i> <?php echo $username; ?></li>
            <li> <a style="text-decoration:none;color:black;" href="logout.php">
        	    	Logout
        	    	
          	</a></li>
        </ul>
    </nav>
    <section class="main-section">
        <div class="notes">
            <h2>My To Do's List</h2>
            <table class="table table-striped table-hover">
            <tbody class="tbody" >
                <?php
                   $sql = "SELECT * FROM $username WHERE type='todo' ORDER BY id DESC";
                   $data =  $con->query($sql);
                   if($data->num_rows > 0){
                    while($row = $data->fetch_assoc()) {
                        
                        $id = $row['id'];
                        $text = $row['text']; 
                      
                ?>


               
                   <tr class="row">
                       <td class="col-10"><?php echo $text; ?></td>
                       <td class="col-2"><form method="POST">
                       <button type="submit" class="btn btn-danger" name="subm" value="<?php echo $id; ?>"><i class="fas fa-check"></i></button>                           
                            </form></td>
                       
                   </tr>
                <?php
                    }
                    
                    }else{ ?>
                    <tr class="row">
                       <td class="col-12" style="color:red;">No To Do's yet! Please Add new! </td>
                      
                   </tr>
                    <?php }?>
               </tbody>
            </table>
            
        </div>

    </section>

    <section class="main-section">
        <div class="notes">
        <span style="color:red"><?php echo $msg; ?></span>
            <h2>Add new</h2>
            <form method="POST">
                <textarea id="textarea" type="textarea" name = "textarea"></textarea>
                <button type="submit" class="btn btn-success" name="submit">Add </button> 
            </form>
            
            
           
        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>