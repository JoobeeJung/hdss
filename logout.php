 <?php
   session_start();
   unset($_SESSION["userid"]);
   unset($_SESSION["name"]);

   header("Location:http://interlaw88.cafe24.com/index.php");   
 ?>
