<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//yhteyden muodostus tietokantaan
include ("./connectdb.php");

//mikäli käyttäjä ei ole kirjautuneena session id=empty, ohjaus login sivulle 
if (empty($_SESSION['user_id'])) {
    echo '<script> alert("Sign in to make a reservation"); window.location.href="../acc/login.php";</script>'; 
}

//sessionissa olevat tiedot funktiolla $_SESSION
$id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$firstname=isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "";
$lastname=isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "";
$email=isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$phn=isset($_SESSION["phn"]) ? $_SESSION["phn"] : "";
$date=isset($_SESSION["date"]) ? $_SESSION["date"] : "";
$start=isset($_SESSION["start"]) ? $_SESSION["start"] : 0;
$res_duration=isset($_SESSION["res_duration"]) ? $_SESSION["res_duration"] : "";
$table=isset($_SESSION["table"]) ? $_SESSION["table"] : "";

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
    <!--window.onload funktio lataa sivun lomakkeen kohdalle-->
    <script>
window.onload = function(){
    window.scrollTo(365, 365);
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
    <div class="res_form center">
        <div class="res_form2">
            <form id='varauslomake' method='post' action='varmistavaraus.php'>
                <h1>Table reservation</h1>
                <h6>Choose a payment method:</h6>    
                <div class="column">
                    <div class="row center">
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/osuuspankki.svg" alt="osuuspankki"></a>
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/nordea.svg" alt="nordea"></a>
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/mobilepay.svg" alt="mobilepay"></a>
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/pivo.svg" alt="pivo"></a>
                    </div>
                </div>
                <div class="column">
                    <div class="row center">
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/mastercard.svg" alt="mastercard"></a>
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/visa.svg" alt="visa"></a>
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/siirto.svg" alt="siirto"></a>
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/handelsbanken.svg" alt="handdesbanken"></a>
                    </div>
                </div>
                <div class="column">
                    <div class="row center">
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/american-express.svg" alt="american-express"></a>
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/apple-pay.svg" alt="apple-pay"></a>
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/alandsbanken.svg" alt="ålandsbanken"></a>
                        <a href="./teevaraus.php"><img class="bank" src="../../assets/bank/aktia.svg" alt="aktia"></a>
                    </div>
                </div>
                <br><button class="cancel" onclick="history.go(-1);">&#128473; Cancel</button>
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