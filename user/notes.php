<?php require_once("../php/connection.php"); ?>
<?php require_once("../php/functions.php");  ?>
<?php require_once("../php/session.php");   ?>
<?php
  $isLoggedin = confirmLogin();
  if($isLoggedin){
      $username = $_SESSION['userN'];

      

  }
  else{
    Redirect_to("logout.php");
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
    <nav class="navbar">
        <ul>
            <li><i class="fa fa-user"></i> <?php echo $username; ?></li>
            <li> <a style="text-decoration:none;color:black;" href="logout.php">
        	    	Logout
        	    	
          	</a></li>
        </ul>
    </nav>
    <section class="main-section">
        <div class="notes">
            <h2>My Notes</h2>
            <table class="table table-striped table-hover">
               
               <tbody class="tbody">
                   <tr class="row">
                       <td class="col-10">Vishal</td>
                       <td class="col-2"><form method="POST">
                       <button type="submit" class="btn btn-primary"><i class="far fa-check-square"></i></button>                           
                            </form></td>
                       
                   </tr>
                   <tr  class="row">
                       <td class="col-10">Vishal</td>
                       <td class="col-2"><form method="POST">
                            <button type="submit" class="btn btn-primary"><i class="far fa-check-square"></i></button>
                                                       
                            </form></td>
                       
                   </tr>
                   <tr class="row">
                       <td class="col-10">Vishal</td>
                       <td  class="col-2"><form method="POST">
                       <button type="submit" class="btn btn-primary"><i class="far fa-check-square"></i></button>                           
                            </form></td>
                       
                   </tr>
                   <tr class="row">
                       <td class="col-10">Vishal</td>
                       <td class="col-2"><form method="POST">
                       <button type="submit" class="btn btn-primary"><i class="far fa-check-square"></i></button>                         
                            </form></td>
                       
                   </tr>
               </tbody>
            </table>
            
        </div>

    </section>

    <section class="main-section">
        <div class="notes">
            <h2>Add new note</h2>
            <form method="POST">
                <textarea id="textarea" type="textarea"></textarea>
                <button type="submit" class="btn btn-success">Add </button> 
            </form>
            
            
        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>