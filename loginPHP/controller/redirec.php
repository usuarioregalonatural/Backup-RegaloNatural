<?php

  session_start();

  if($_SESSION['cargo'] == 1){
//    header('location: ../view/admin/index.php');
      header('location: ../view/dashboard/index.html');
  }else if($_SESSION['cargo'] == 2){
//    header('location: ../view/user/index.php');
    header('location: ../view/dashboard/index.html');
  }

 ?>
