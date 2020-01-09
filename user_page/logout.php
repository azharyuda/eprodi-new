<?php
  error_reporting();
  session_start();

  header("location: ../index.php");
  session_destroy();

 ?>
