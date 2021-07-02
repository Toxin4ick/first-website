<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/main.css"></link>
  </head>
  <body>
    <button id="btn_modal_window">Open Modal</button>
      <div id="my_modal" class="modal">
        <div class="modal_content">
          <span class="close_modal_window">×</span>
          <p>Модальное окно!</p>
        </div>
      </div>
      <script>
      var modal = document.getElementById("my_modal");
var btn = document.getElementById("btn_modal_window");
var span = document.getElementsByClassName("close_modal_window")[0];

btn.onclick = function () {
   modal.style.display = "block";
}

span.onclick = function () {
   modal.style.display = "none";
}

window.onclick = function (event) {
   if (event.target == modal) {
       modal.style.display = "none";
   }
}
      </script>
  </body>
</html>
