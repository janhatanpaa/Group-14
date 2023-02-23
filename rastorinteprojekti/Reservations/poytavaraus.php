<?php
session_start();
if (empty($_SESSION['user_id'])) {
  echo '<script> alert("Sign in to make a reservation"); window.location.href="../acc/login.php";</script>'; 
}

$id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/rastorintefavicon.png">
    <link href="../../css/reservations.css" rel="stylesheet" type="text/css">
    <title>Table reservation - Rastorinte</title>
</head>
<body>
  <header>
    <a href="../../index.html"><img class="logo" src="../../assets/rastorinte.png" alt="restaurant-rastorinte"></a>
</header>
<nav>
    <div class="navbar grey topBotomBordersIn">
        <a href="../../menu.html" style="font-size: 15px;">Menu</a>
        <a href="../../index.html" style="font-size: 15px;">Home</a>
        <a href="../../gallery.html" style="font-size: 15px;">Gallery</a>
        <a href="../../rastorinteprojekti/acc/index.php" style="font-size: 15px;">Account</a>
    </div>
</nav>
<!--window.onload funktio lataa sivun lomakkeen kohdalle-->
<script>
window.onload = function(){
    window.scrollTo(340, 340);
}
</script>
<div class="res_form center">
  <div class="res_form2">
    <form id='varauslomake' method='post' action='table.php'>
      <img class="reserveimg" src="../../assets/reserve2.jpg" alt="">
      <h1>Table reservation</h1>
      <table>
        <tr>
          <td>
            <p>Reservation date:</p>
          </td>
          <!--max date vuoden loppuun asti-->
          <td><input class="date" type="date" id="datePickerId" max="2023-12-31" name='date' required></td>
        </tr>
          <tr>
            <td>
              <p>Reservation time:</p>
            </td>
            <td>
              <!--datepicker scripti estää valitsemasta pienempää päivää kuin nykyinen-->
              <script>
              datePickerId.min = new Date().toISOString().split("T")[0];
              </script>
              <!--select 'required' estää syöttämästä tyhjää vaihtoehtoa-->
              <select type="time" name="start" required>
                <option value="" selected disabled hidden>Starting time</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
              </select>
            </td>
          </tr>
            <tr>
              <td>
                <p>Reservation duration <br>(Max 4 hours):</p>
              </td>
              <!--select 'required' estää syöttämästä tyhjää vaihtoehtoa-->
                <td><select id="duration" name="res_duration" required>
                  <option value="" selected disabled hidden>Duration</option>
                  <option value="10">1 Hour</option>
                  <option value="15">2 Hours</option>
                  <option value="25">3 Hours</option>
                  <option value="30">4 Hours</option>
                </select>
              <p id="price"></p>
              <!--scripti näyttää hinnan tunnille valitessa vaihtoehdon -->
              <script>
                  var drop = document.getElementById("duration");
                    var price = document.getElementById("price");
                    drop.onchange = function() {
                    price.innerHTML = "Price: " + drop.value + "€";
                    }</script>
              </td>
          </tr>
      </table>
        <button class="cancel" onclick="location.href='../acc/home.php';">&#129136; Back</button> 
        <input style="width: 100px;" class="send" type='submit' name='ok' value='Next &#129138;'>
      </form>
  </div>
</div>
    <footer>
      <div class="footer">  
          <div class="row">
              <div class="column use-links">
                  <p>Rastorinte</p>
                      <p><a href="menu.html" style="font-size: 13px;">Menu</a></p>
                      <p><a href="index.html" style="font-size: 13px;">Home</a></p>
                      <p><a href="gallery.html" style="font-size: 13px;">Gallery</a></p>
                      <p><a href="../../rastorinteprojekti/acc/index.php" style="font-size: 13px;">Account</a></p>
                  </div>
              <div class="column use-links">
                  <p>Follow Us</p>          
                      <p><a href="https://www.facebook.com/" style="font-size: 13px;">Facebook</a></p>
                      <p><a href="https://www.instagram.com/" style="font-size: 13px;">instagram</a></p>
                  </div>       
              <div class="column use-links">
                  <p>Address</p>
                      <p style="font-size: 13px;">Jokutie 2 13100 Hämeenlinna</p>
                      <p><a id="phone" style="font-size: 13px;">+35840 5656767 </a></p>
                      <p><a style="font-size: 13px;">rastorinte@rastorinte.fi</a></p>
                  </div>
              </div>
          </div>
          <p class="copyright">©Copyright reserved to Joonas, Jan, Jami, Otto</p>
      </footer>
</body>
</html>