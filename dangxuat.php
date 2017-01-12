<?php
  session_start();

  if(!isset($_SESSION['taikhoan']))
  {
    header("Location: index.php");
  }
  session_destroy();
  unset($_SESSION['taikhoan']);
  header("Location: index.php");
?>
