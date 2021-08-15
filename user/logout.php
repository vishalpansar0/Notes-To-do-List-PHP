<?php require_once("../php/connection.php"); ?>
<?php require_once("../php/functions.php");  ?>
<?php require_once("../php/session.php");   ?>
<?php
   $_SESSION["userN"] = null;

   session_destroy();
   Redirect_to("../index.php");


?>