<?php require_once("../php/connection.php"); ?>
<?php require_once("../php/functions.php");  ?>
<?php require_once("../php/session.php");   ?>
<?php
$text=null;
$title_view=null;
$close_btn=null;
  $isLoggedin = confirmLogin();
  if($isLoggedin){
      $username = $_SESSION['userN'];

  }
  else{
    Redirect_to("logout.php");
  }

  if(isset($_POST['delete_btn'])){
    $del_id = $_POST['delete_btn'];
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
    <title>
      
    My Notes</title>
    <link rel="icon" href="../icon.png" type="image/x-icon">  
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/58106dd2b0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="index.php" style = "text-decoration:none;color:white;"><button class = "btn btn-primary"><strong>My To Do's</strong></button></a></li>
            <li><i class="fa fa-user"></i> <?php echo $username; ?></li>
            <li> <a style="text-decoration:none;color:black;" href="logout.php">
        	    	Logout
        	    	
          	</a></li>
        </ul>
    </nav>

     <span><section style="display: flex;
     flex-wrap: wrap;
    justify-content: center;
    align-items: center;">
        <?php
           if(isset($_POST['view'])){
                $text_id = $_POST['view'];
                $sql_view = "SELECT text,title FROM $username where id='$text_id'";
                $data_text = $con->query($sql_view);
                $row_text = $data_text->fetch_assoc();
                $text = $row_text['text'];
                $title_view = $row_text['title'];
                $close_btn="Close";
           }
        ?><span><div class="text_view" style="box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.2);
        
        margin: 2rem;
        width: 800px;"><form method="POST">
            <button type="submit" name="closeView" style="float:right; margin:10px;border:none;position:relative;"><?php echo $close_btn; ?></button>
        </form>


            <?php
             if(isset($_POST['closeView'])){
                 $title_view=null;
                 $text=null;
                 $close_btn=null;
             }
            ?>


            <h3 style="margin:15px;"><?php echo $title_view; ?></h3>
            <p style="margin:15px 15px 0px 15px;"><?php echo $text; ?></p>
        </div></span>
        

    </section></span>

    <section class="main-section">
        <div class="notes">
            <div class="row">
            <h2 class="col-4">My Notes</h2>
            <h2 class="offset-5 col-3"><a href="addnote.php" style = "text-decoration:none;color:white;"><button class = "btn btn-success"><strong>Add New Note</strong></button></a></h2>
            </div>
            <table class="table table-striped table-hover">
               
               <tbody class="tbody">
               <?php
                   $sql = "SELECT * FROM $username WHERE type='note'";
                   $data =  $con->query($sql);
                   if($data->num_rows > 0){
                    while($row = $data->fetch_assoc()) {
                        $title = $row['title'];
                        $id = $row['id'];
                        
                      
                ?>

                   <tr class="row">
                       <td class="col-8" style="font-weight:600;font-size:20px;"><?php echo $title; ?></td>
                       <td class="col-2"><form method="POST">
                       <button type="submit" class="btn btn-primary" name="view" value="<?php echo $id; ?>"><i class="fas fa-eye"></i> View</button>
                            </form></td>
                            <td class="col-1"><form method="POST">
                       <a href="editnote.php?id=<?php echo $id; ?>"><i class="fas fa-edit btn btn-warning"></i></a>
                            </form></td>
                       <td class="col-1"><form method="POST">
                       <button type="submit" class="btn btn-danger" name="delete_btn" value="<?php echo $id; ?>"><i class="fas fa-trash"></i></button>
                            </form></td>  
                                                      
                       
                   </tr>
                   <?php
                    }
                    
                    }else{ ?>
                    <tr class="row">
                       <td class="col-12" style="color:red;">No Notes yet! Please Add new! </td>
                      
                   </tr>
                    <?php }?>
                   
                       
               </tbody>
            </table>
            
        </div>

    </section>

    <!-- <section class="main-section">
        <div class="notes">
            <h2>Add new note</h2>
            <form method="POST">
                <textarea id="textarea" type="textarea"></textarea>
                <button type="submit" class="btn btn-success">Add </button> 
            </form>
            
            
        </div>

    </section> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>