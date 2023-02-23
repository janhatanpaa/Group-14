<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//yhteyden muodostus tietokantaan
include ("./connectdb.php");

//mikäli käyttäjä ei ole kirjautuneena session id=empty, ohjaus login sivulle 
if (empty($_SESSION['user_id'])) {
    echo '<script> alert("Sign in to make a reservation"); window.location.href="../acc/login.php";</script>'; 
}
//Luetaan lomakkeelta tulleet tiedot funktiolla $_POST ja sessionissa olevat tiedot funktiolla $_SESSION
//laitetaan $_POST tiedot sessioniin
$id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$firstname=isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "";
$lastname=isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "";
$email=isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$phn=isset($_SESSION["phn"]) ? $_SESSION["phn"] : "";
$date=isset($_POST["date"]) ? $_POST["date"] : 0;
$start=isset($_POST["start"]) ? $_POST["start"] : 0;
$res_duration=isset($_POST["res_duration"]) ? $_POST["res_duration"] : "";
$_SESSION["date"]=$date;
$_SESSION["start"]=$start;
$_SESSION["res_duration"]=$res_duration;

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
<!--window.onload funktio lataa sivun lomakkeen kohdalle-->
<script>
window.onload = function(){
    window.scrollTo(340, 340);
}
</script>
<nav>
    <div class="navbar grey topBotomBordersIn">
        <a href="../../menu.html" style="font-size: 15px;">Menu</a>
        <a href="../../index.html" style="font-size: 15px;">Home</a>
        <a href="../../gallery.html" style="font-size: 15px;">Gallery</a>
        <a href="../../rastorinteprojekti/acc/index.php" style="font-size: 15px;">Account</a>
    </div>
</nav>
<div class="res_form center">
  <div class="res_form2">
    <form id='varauslomake' method='post' action='varmistavaraus.php'>
      <img class="reserveimg" src="../../assets/reserve2.jpg" alt="">
      <h1>Table reservation</h1>
      <h3>How many guests are coming?</h3>
      <span>We have table sizes from table for two to table for sixteen guests</span>
        <table>
            <tr>
                <td>
                    <!--select 'required' estää syöttämästä tyhjää vaihtoehtoa-->
                    <select style="margin-top: 2em;" id="guests" name="table" required>
                        <option value="" selected disabled hidden>Table size</option>
                        <option value="5">1-2 guests</option>
                        <option value="8">3-4 guests</option>
                        <option value="15">4-8 guests</option>
                        <option value="25">8-16 guests</option>
                        <option value="40">More than 16 guests</option>
                    </select>
                    <p id="price"></p>
                    <!--scripti näyttää hinnan vierasmäärälle valitessa vaihtoehdon -->
                        <script>
                            var drop = document.getElementById("guests");
                            var price = document.getElementById("price");
                            drop.onchange = function() {
                            price.innerHTML = "Price: " + drop.value + "€";      }
                        </script>
                    </td>
                </tr>
            </table>
            <button class="cancel" onclick="history.go(-1);">&#129136; Back</button> 
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