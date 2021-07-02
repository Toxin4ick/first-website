<?php

    session_start();
    require_once 'connect.php';

    $name=$_POST['names'];
    $text=$_POST['texty'];
    $adder=$_SESSION['user']['login'];
    $poth = 'uploads/' . time() . $_FILES['image']['name'];
    if (!move_uploaded_file($_FILES['image']['tmp_name'], '../' . $poth)) {
        echo "oshibka";
    }

  mysqli_query($connect, "INSERT INTO `poster` (`id`, `names`, `texty`, `adder`, `date`, `imagevi` ) VALUES (NULL, '$name', '$text', '$adder', CURRENT_DATE(), '$path')");
  mysqli_query($connect, "INSERT INTO `poster` (`id`, `name`, `text`, `adder`, `date`, `image`) VALUES (NULL, '$name', '$text', '$adder', CURRENT_DATE, '$poth')");
//  mysqli_query($connect, "INSERT INTO `users` (`id`) VALUES (NULL)");
      ?>
