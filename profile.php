<?php
require_once 'vendor/connect.php';
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
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
$not_my_profile = mysqli_query($connect, "SELECT * FROM `users` where `id`=".$_GET['id']);
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
  <a href="http://toxin-fail/profile.php"> <img src="<?= $not_my_prof['avatar'] ?>" class="avatarka" style="border-radius: 50px;" width="50" height="50"></a>
  </div>
</div>
  <div class="divniy">
<img src ="<?=$not_my_prof['avatar']?>"style="border-radius: 500px;" width="100" height="100" alt="">
<h1 style="margin: 10px;"> <?=$not_my_prof['login']?> </h1>
</div>
<div class="for_text_about_me">
<h2> Интересы </h2> <br/>
</div>
<div class="" style="margin-left: 45%;     margin-right: 10%;">
  <?php
  $okay = $not_my_prof['login'];
$poster= mysqli_query($connect, "SELECT * FROM `poster` where `adder`='$okay' ");

   ?>

   <?php
while ($arto = mysqli_fetch_assoc($poster))
 { ?>
   <article class="div_blogov">
                   <div class="prikol_dl9_svoix" style=" background-image: url(<?php echo $arto['image']; ?>); background-repeat:no-repeat;
 background-size: cover;">

 <div class="" style="position:absolute; bottom:0;">
           <div class="info" style="">
             <a href="http://toxin-fail/watchpost.php?id=<?=$arto['id']?>">  <h2 style="word-break: break-all; color: white; text-shadow: black 0 0 2px;"><?php echo $arto['name']; ?></h2> </a>
               <p style="color: white; text-shadow: black 0 0 2px;" ><?php echo mb_substr($arto['text'], 0, 80, 'utf-8') ?></p>
           </div>
 <div class="" style="display:flex">

           <div class="taxonomy" style="text-align:left;width:60%;">
               <span style="color: white; text-shadow: black 0 0 2px;">
                   <?php echo $arto['adder'] ?>
               </span>
               </div>
               <div>
             <a style="color: white; text-shadow: black 0 0 2px;"><?= $arto['date'] ?></a>
               </div>
             </div>
           </div>
         </div>
       </article>
      <?php
}
    ?>
</div>
<?php } } else{ ?>
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
    <div >
      <div method="post" class="divniy">
        <div class="logo_normalno">
  <img src ="<?=$_SESSION['user']['avatar']?>"style="border-radius: 500px;" width="100" height="100" alt="">
  <h1 width="100" style="margin-left: 4%"> <?=$_SESSION['user']['login']?> </h1>
  </div>
  <button onclick="location.hash ='zatemnenie'" class="button button-for-profile" ><a>Настройки профиля</a></button>

  <div id="zatemnenie">

     <window >

         <a href="#close_window" class="close_window">X</a>
         <form action="vendor/setting.php" method="post" enctype="multipart/form-data" style="flex-direction: column">
             <label>ФИО</label>
             <input type="text" name="full_name" placeholder="Введите свое полное имя" value="<?= $_SESSION['user']['full_name']?>">
             <label>Логин</label>
             <input type="text" name="login" placeholder="Введите свой логин" value="<?= $_SESSION['user']['login']?>">
             <label>Изображение профиля</label>
             <input type="file" name="avatar" value="<?= $_SESSION [$_FILES['avatar']['name']]?>">
             <button type="submit">Редактировать</button>
             <a href="vendor/logout.php" class="logout">Выход</a> </br>
         </form>
     </window>
</div>
  </div>
  <div class="for_text_about_me">
  <h2 style="margin-bottom: 0px; width: 220px; text-align: left;"> Интересы </h2>
  <p style="margin-top: 0px"><?=$_SESSION['user']['aboutme']?></p>
</div>
<div class="" style="margin-left: 45%;     margin-right: 10%;">
  <?php
  $okay = $_SESSION['user']['login'];
$poster= mysqli_query($connect, "SELECT * FROM `poster` where `adder`='$okay' ");

   ?>

   <?php
while ($arto = mysqli_fetch_assoc($poster))
 { ?>
   <article class="div_blogov">
                   <div class="prikol_dl9_svoix" style=" background-image: url(<?php echo $arto['image']; ?>); background-repeat:no-repeat;
 background-size: cover;">

 <div class="" style="position:absolute; bottom:0;">
           <div class="info" style="">
             <a href="http://toxin-fail/watchpost.php?id=<?=$arto['id']?>">  <h2 style="word-break: break-all; color: white; text-shadow: black 0 0 2px;"><?php echo $arto['name']; ?></h2> </a>
               <p style="color: white; text-shadow: black 0 0 2px;" ><?php echo mb_substr($arto['text'], 0, 80, 'utf-8') ?></p>
           </div>
 <div class="" style="display:flex">

           <div class="taxonomy" style="text-align:left;width:60%;">
               <span style="color: white; text-shadow: black 0 0 2px;">
                   <?php echo $arto['adder'] ?>
               </span>
               </div>
               <div>
             <a style="color: white; text-shadow: black 0 0 2px;"><?= $arto['date'] ?></a>
               </div>
             </div>
           </div>
         </div>
       </article>
      <?php
}
    ?>
</div>
<?php } ?>
</div>


</body>
</html>
