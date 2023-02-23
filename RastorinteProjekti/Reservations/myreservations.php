<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";

//mikäli käyttäjä ei ole kirjautuneena session id=empty, ohjaus login sivulle 
if (empty($_SESSION['user_id'])) {
    echo '<script> alert("Sign in to see reservations"); window.location.href="../acc/login.php";</script>'; 
}

//yhteyden muodostus tietokantaan
$yhteys=mysqli_connect("db", "root", "password");
if (!$yhteys){
    die("Yhteys epäonnistui".mysqli_error());
}
//tietokannan valinta
$ok=mysqli_select_db($yhteys, "test_db");
if (!$ok){
    die("Tietokannan valinta epäonnistui".mysqli_error());
}
//Kyselyn tekeminen $_SESSION 'id:n' perusteella
$tulos=mysqli_query($yhteys, "select * from reservations where user_id= '$id'");

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
    <style>       
    table, td, th {
    padding: 5px;

    }
    th {
        background-color: #494949ac;
        color: white;
        box-shadow: 5px 10px 18px #888888;
        font-weight: 100;
    }
    td {
        background-color: #ffffff89;
        box-shadow: 5px 10px 18px #888888;
    }

    table {
        width: 80%;
        border-collapse: collapse;
    }
</style>
</head>
<body>
    <!--window.onload funktio lataa sivun lomakkeen kohdalle-->
<script>
window.onload = function(){
    window.scrollTo(320, 320);
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
        ?>
        <table>
        <tr>
            <th>Reservation date</th>
            <th>Reservor</th>            
            <th>Starting time</th>
            <th>Duration</th>
            <th>Table size</th>
        </tr>
        <tr>
             <!--tulostetaan tietokantayselyssä saatujen tietojen tiedot lomakkeelle-->
            <?php 
            echo 
            "<td> $rivi->date</td>
            <td>$rivi->firstname $rivi->lastname</td>           
            <td>$rivi->start</td>
            <td>$rivi->res_duration</td>
            <td>$rivi->guest_amount</td>";
        }           
        ?>
        </tr>
    </table>
    </section>
     <button class="cancel"><a style="color: black" href="../acc/home.php">Back</a></button>
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
