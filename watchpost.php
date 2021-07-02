<?php
require_once 'vendor/connect.php';
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>
  <?php if(isset($_GET['id'])) { ?>
<?php
$not_my_profile = mysqli_query($connect, "SELECT * FROM `poster` where `id`=".$_GET['id']);
$connectys_k_tebe = mysqli_query($connect, "SELECT * FROM `users` inner join `poster` on (poster.adder=users.login) where poster.id=".$_GET['id']);
$add_comment = mysqli_query($connect, "SELECT * FROM `commenti` inner join `poster` on (poster.id=commenti.postid) inner join `users` on (commenti.userid=users.id) where poster.id=".$_GET['id']);
$fjirej=mysqli_fetch_assoc($connectys_k_tebe);
while ($not_my_prof = mysqli_fetch_assoc($not_my_profile)) { ?>
<div class="head">
<a href="http://toxin-fail/index.php"> <img class="logo" src="uploads/horizontal_on_white_by_logaster.png" alt=""> </a>
<div class="d1">
  <form method="get" action="searchindex.php">
  <input type="search" placeholder="Искать здесь..." name="searchyi">
  <button type="submit" name="SYBt"></button>
  </form>
</div>
  <div class="mini_avatar"> 
  <a href="http://toxin-fail/profile.php"> <img src="<?= $_SESSION['user']['avatar'] ?>" class="avatarka" style="border-radius: 50px;" width="50" height="50"></a>
  </div>
</div>
  <div class="divniy">
<a href="http://toxin-fail/profile.php?id=<?= $not_my_prof['id']?>"> <img src ="<?=$fjirej['avatar']?>"style="border-radius: 500px;" width="100" height="100" alt=""> </a>
<div style="text-align: justify">
<h2 style="margin: 10px;"> <?=$not_my_prof['adder']?> </h2>
</div>
</div>
<div class="for_text_about_me">
<h1> <?=$not_my_prof['name'] ?></h1>
</div>
<div class="" style="margin-left:25%; margin-right:25%; word-break: break-all">
  <h3><?=$not_my_prof['text'] ?></h3>
</div>
<div class="" style="margin-left:25%; margin-right:25%">
  <h3>комментарии</h3>
</div>
<form action="vendor/addcommnet.php" class="kommenti" method="post">
<div class="">
    <img src ="<?= $_SESSION['user']['avatar'] ?>"style="border-radius: 50px;" width="50" height="50" alt="">
</div>
<div class="search_v_nytri-loz">
  <input class="search_ya_vyezhay" style="text-align: center;" type="text" name="textovik" placeholder="Напишите своё мнение" required>
  <button type="submit">Добавить</button>
  <input type="text" name="posterid" value="<?= $not_my_prof['id'] ?>" style="visibility:hidden;width: 0px;height: 0px;border-left-width: 0px;padding-left: 0px;">
</div>
</form>
<?php while($juijuiw=mysqli_fetch_assoc($add_comment)){ ?>
<div class="kommenti2">
<div class="">
    <img src ="<?= $juijuiw['avatar'] ?>"style="border-radius: 50px;" width="50" height="50" alt="">
</div>
  <h4 style="margin-left: 5%;"> <?=$juijuiw['comment'] ?> </h4>
</div>
 <?php  }?>
<?php } } ?>
</body>
</html>
