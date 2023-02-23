<?php
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
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
$price=isset($_SESSION["price"]) ? $_SESSION["price"] : "";

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
            <h1>Thank you for your reservation!</h1>
        <section>
        <h5>Table reservation details:</h5>
        <span> Table for <?php
            //table size valikossa valuet numeroina tarkoittaen hintaa
            //if-else ehtolauseella muutetaan valuet vierasmääriksi, lomakkeelle tulostusta varten
            if ($table==5) {echo "1-2 guests";}
            else if ($table==8) {echo "3-4 guests";}
            else if ($table==15) {echo "4-8 guests";}
            else if ($table==25) {echo "8-16 guests";}
            else if ($table==40) {echo "+16 guests";}?>
            </span><br>
        <span> Reservation date and time: <?php echo "$date $start"?></span><br>
        <span> Reservation duration: 
                <?php 
                //res_duration valikossa sama juttu, valuet numeroina tarkoittaen hintaa
                //if-else ehtolauseella muutetaan valuet tuntimääriksi, lomakkeelle tulostusta varten
                if ($res_duration==10) {echo "1 hour";}
                else if ($res_duration==15) {echo "2 hours";}
                else if ($res_duration==25) {echo "3 hours";}
                else if ($res_duration==30) {echo "4 hours";}?>
                </span><br>
        <span><b>Reservation total: <?php echo "$price €"?></b></span>
    </section>
    <section>
        <h5>Contact details:</h5>
        <span> Name: <?php echo "$firstname $lastname"?></span><br>
        <span> Email: <?php echo $email?></span><br>
        <span> Phone number: <?php echo $phn?></span>
    </section>
    
        <button class="end"><a href="../acc/home.php">Home</a></button>
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