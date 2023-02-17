<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $yhteys=mysqli_connect("db", "root", "password", "test_db");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}

//Luetaan lomakkeelta tulleet tiedot funktiolla $_POST
//jos syötteet ovat olemassa
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
    <link href="../../css/reservations.css" rel="stylesheet" type="text/css">

    <title>Document</title>
</head>
<body>
<header>
    <a href="index.html"><img class="logo" src="../../assets/rastorinte.png" alt="restaurant-rastorinte"></a>
</header>
<script>
window.onload = function(){
    window.scrollTo(490, 490);
}
</script>

<nav>
    <div class="navbar grey topBotomBordersIn">
        <a href="menu.html" style="font-size: 15px;">Menu</a>
        <a href="index.html" style="font-size: 24px;">Home</a>
        <a href="gallery.html" style="font-size: 15px;">Gallery</a>
    </div>
</nav>
<div class="res_form grey center">
    <div class="res_form2">
<img class="reserveimg" src="../../assets/reserve2.jpg" alt="">
    <h1>Table reservation</h1>
    <h4>Table reservation details:</h4>
    <span> Reservation date and time: <?php echo "$date $start"?></span><br>
    <span> Reservation duration: <?php echo $res_duration?></span><br>
    <h4>Contact details:</h4>
    <span> Name: <?php echo "$firstname $lastname"?></span><br>
    <span> Email: <?php echo $email?></span><br>
    <span> Phone number: <?php echo $phn?></span><br>
    <h3>Do you want to confirm the reservation?</h3>
    <form action="teevaraus.php" method='post'>
    <div class="button center">
    <input type='submit' class="send" name='ok' value='Confirm reservation'>
        <button class="cancel" onclick="history.go(-1);">Cancel </button>
    </form>
    </div>
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