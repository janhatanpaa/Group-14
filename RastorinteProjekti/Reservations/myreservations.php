<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";

//yhteyden muodostus
$yhteys=mysqli_connect("db", "root", "password");
if (!$yhteys){
    die("Yhteys epäonnistui".mysqli_error());
}
//tietokannan valinta
$ok=mysqli_select_db($yhteys, "test_db");
if (!$ok){
    die("Tietokannan valinta epäonnistui".mysqli_error());
}
//Kyselyn tekeminen 
$tulos=mysqli_query($yhteys, "select * from reservations where user_id= '$id'");

//Tulostietojen tulostus

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/rastorintefavicon.png">
    <link href="../../css/reservations.css" rel="stylesheet" type="text/css">
    <title>My reservations - Rastorinte</title>
</head>
<body>
<script>
window.onload = function(){
    window.scrollTo(350, 350);
}
</script>
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
<nav>
    <div class="res_form grey center">
        <div class="res_form2">
            <img class="reserveimg" src="../../assets/reserve2.jpg" alt="">
            <h1>My reservations</h1>
        <section>
        <h5>Table reservation details:</h5>
        <section>
    <?php 
    while ($rivi=mysqli_fetch_object($tulos)){
        echo "Reservor: $rivi->firstname $rivi->lastname <br> Date of the reservation: $rivi->date <br> Starting time: $rivi->start <br> Reservation duration: $rivi->res_duration <br> Table size: $rivi->guest_amount<br><br>\n";}?>
    </section>
     <button class="end"><a href="../acc/home.php">Back</a></button>
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
                        <p><a href="../../rastorinteprojekti/acc/index.php" style="font-size: 13px;">Account</a><p>
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
