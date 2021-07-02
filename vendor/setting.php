<?php

    session_start();
    require_once 'connect.php';
$userid=$_SESSION['user']['id'];
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $aboutme = $_POST['aboutme'];
    $path = 'uploads/'. $_FILES['avatar']['name'];
    $avatar=$_POST['avatar'];
    if ($_FILES['avatar']['size'] === 0) {
      echo "всё пиздец";
      $check_user = mysqli_query($connect, "UPDATE `users` SET `full_name`='$full_name',`login`='$login', `aboutme`='$aboutme' WHERE `id`='$userid'");
      if($login != $_SESSION['user']['login']) {
        mysqli_query($connect, "UPDATE `users` SET `login`='$login', WHERE `id`='$userid'" );
        $_SESSION['user']['login']= $login;
      }
      if($full_name != $_SESSION['user']['full_name']) {
        mysqli_query($connect, "UPDATE `users` SET `full_name`='$full_name', WHERE `id`='$userid'" );
        $_SESSION['user']['full_name']= $full_name;
      }
      die();
    } else {
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path);
    $check_user = mysqli_query($connect, "UPDATE `users` SET `full_name`='$full_name',`login`='$login', `aboutme`='$aboutme', `avatar`='$path' WHERE `id`='$userid'" );
    header('Location: ../profile.php');

  if($login != $_SESSION['user']['login']) {
    mysqli_query($connect, "UPDATE `users` SET `login`='$login', WHERE `id`='$userid'" );
    $_SESSION['user']['login']= $login;
  }
  if($full_name != $_SESSION['user']['full_name']) {
    mysqli_query($connect, "UPDATE `users` SET `full_name`='$full_name', WHERE `id`='$userid'" );
    $_SESSION['user']['full_name']= $full_name;
  }
  if($path != $_SESSION['user']['avatar']) {
    mysqli_query($connect, "UPDATE `users` SET `avatar`='$path', WHERE `id`='$userid'" );
    $_SESSION['user']['avatar']= $path;
  }
  }
  ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    print_r($_FILES);
    ?>
</pre>
