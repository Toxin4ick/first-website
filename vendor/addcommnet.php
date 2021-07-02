<?php

    session_start();
    require_once 'connect.php';
    $textovik=$_POST['textovik'];
    $userid=$_SESSION['user']['id'];
    $posteid= $_POST['posterid'];
  mysqli_query($connect, "INSERT INTO `commenti` (`id`, `comment`, `userid`, `postid`) VALUES (NULL, '$textovik', '$userid', '$posteid')");
//  mysqli_query($connect, "INSERT INTO `users` (`id`) VALUES (NULL)");
      ?>
