<?php

    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
         }
      ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/main.css"></link>
  </head>
  <body>
    <div class="div_for_normal">


    <form action="vendor/posterpost.php" method="post" enctype="multipart/form-data" class="form_login">
        <label>Название</label>
        <input type="text" name="names" placeholder="Введите название статьи">
        <label>Текст статьи</label>
        <textarea type="text" name="texty" placeholder="Введите текст статьи" style="width:200%; height: 502px"></textarea>
        <label>Картинка</label>
        <input type="file" name="image" placeholder="Добавьте фото">
        <button type="submit">Добавить</button>
    </form>
    </div>
  </body>
</html>
