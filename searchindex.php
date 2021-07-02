<?php
session_start();
require_once 'vendor/connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css"></link>
</head>
<body>
  <div class="head">
  <a href="http://toxin-fail/index.php"> <img class="logo" src="uploads/horizontal_on_white_by_logaster.png" alt=""> </a>
  <div class="d1">
    <form method="get" action="searchindex.php">
    <input type="search" placeholder="Искать здесь..." name="searchyi">
    <button type="submit" name="SYBt"></button>
    </form>
  </div>
    <?php
    if ($_SESSION['user']) {?>
      <div class="mini_avatar">
          <a href="http://toxin-fail/profile.php"> <img src="<?= $_SESSION['user']['avatar'] ?>" class="avatarka" style="border-radius: 50px;" width="50" height="50"></a>
      </div>
  <?php } else {?>
    <button id="button_register" style="background: none; border: none"><a>Регистрация</a></button>
    <button id="button" style="background: none; border:none"><a>Авторизация</a></button>
<?php  }?>

  </div>
  <div class="" style="margin-left: 45%;     margin-right: 10%;">
    <?php
    $search_get=$_GET['searchyi'];
  $poster= mysqli_query($connect, "SELECT * FROM `poster` where `name` like '%$search_get%'");

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

<!-- Форма авторизации -->
<div id="my_modal" class="modal" class="modal_login" style="visibility: hidden; opacity: 0">

<div class="popap_body">


    <form action="vendor/signin.php" method="post" class="form_login">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
    </div>
  </div>

  <div id="my_modaly" class="modal" class="modal_login" style="visibility: hidden; opacity: 0">
  <div class="popap_body">
  <form action="vendor/signup.php" method="post" enctype="multipart/form-data" class="form_login">
      <label>ФИО</label>
      <input type="text" name="full_name" placeholder="Введите свое полное имя">
      <label>Логин</label>
      <input type="text" name="login" placeholder="Введите свой логин">
      <label>Почта</label>
      <input type="email" name="email" placeholder="Введите адрес своей почты">
      <label>Изображение профиля</label>
      <input type="file" name="avatar">
      <label>Пароль</label>
      <input type="password" name="password" placeholder="Введите пароль">
      <label>Подтверждение пароля</label>
      <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
      <button type="submit">Войти</button>
      <p>
          У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
      </p>
      <?php
          if ($_SESSION['message']) {
              echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
          }
          unset($_SESSION['message']);
      ?>
  </form>
</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  var button =document.getElementById("button");
  var button_register = document.getElementById("button_register");
  var modal = document.getElementById('my_modal');
  var modaly = document.getElementById('my_modaly');
button.addEventListener('click', function(){
  modal.style.opacity = "1";
  modal.style.visibility = "visible";
});
button_register.addEventListener('click', function(){
  modaly.style.opacity = "1";
  modaly.style.visibility = "visible";
});
</script>

</body>
</html>
