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
$date=isset($_SESSION["date"]) ? $_SESSION["date"] : "";
$start=isset($_SESSION["start"]) ? $_SESSION["start"] : 0;
$res_duration=isset($_SESSION["res_duration"]) ? $_SESSION["res_duration"] : "";
$table=isset($_POST["table"]) ? $_POST["table"] : "";
$_SESSION["table"]=$table;
$price = intval($res_duration) + intval($table);
$_SESSION["price"]=$price;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/reservations.css" rel="stylesheet" type="text/css">

    <title>Table reservation - Rastorinte</title>
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
        <a href="../../rastorinteprojekti/acc/index.php" style="font-size: 15px; position: absolute; top: 27.5%; left: 75%;">Account</a>
    </div>
</nav>
<div class="res_form grey center">
    <div class="res_form2">
        <img class="reserveimg" src="../../assets/reserve2.jpg" alt="">
        <h1>Table reservation</h1>
        <section class="center">
            <h5>Table reservation details:</h5>
            <span> Table for <?php
            if ($table==5) {echo "1-2 guests";}
            else if ($table==8) {echo "3-4 guests";}
            else if ($table==15) {echo "4-8 guests";}
            else if ($table==25) {echo "8-16 guests";}
            else if ($table==40) {echo "+16 guests";}?>
            </span><br>
            <span> Reservation date and time: <?php echo "$date $start"?></span><br>
            <span> Reservation duration: 
                <?php 
                if ($res_duration==10) {echo "1 hour";}
                else if ($res_duration==15) {echo "2 hours";}
                else if ($res_duration==25) {echo "3 hours";}
                else if ($res_duration==30) {echo "4 hours";}?>
                </span><br>
        </section><br>
        <section class="center">
            <h5>Contact details:</h5>
            <span> Name: <?php echo "$firstname $lastname"?></span><br>
            <span> Email: <?php echo $email?></span><br>
            <span> Phone number: <?php echo $phn?></span><br><br>
        </section>
        <h4><b>Reservation total: <?php echo "$price €"?></b></h4>
        <h3>Do you want to continue to payment?</h3>
        <form action="payment.php" method='post'>
            <div class="button center">
                <button class="cancel" onclick="history.go(-2);">&#128473; Cancel</button>
                <input type='submit' class="send" name='ok' value='Continue &#10004;'>
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