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
$table=isset($_SESSION["table"]) ? $_SESSION["table"] : "";
$price=isset($_SESSION["price"]) ? $_SESSION["price"] : "";

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
<script>
window.onload = function(){
    window.scrollTo(415, 415);
}
</script>
<header>
    <a href="index.html"><img class="logo" src="../../assets/rastorinte.png" alt="restaurant-rastorinte"></a>
</header>
<nav>
    <div class="navbar grey topBotomBordersIn">
        <a href="menu.html" style="font-size: 15px;">Menu</a>
        <a href="index.html" style="font-size: 24px;">Home</a>
        <a href="gallery.html" style="font-size: 15px;">Gallery</a>
        <a href="../../rastorinteprojekti/acc/index.php" style="font-size: 15px; position: absolute; top: 27.5%; left: 75%;">Account</a>
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
        <span><b>Reservation total: <?php echo "$price €"?></b></span>
    </section>
    <section>
        <h5>Contact details:</h5>
        <span> Name: <?php echo "$firstname $lastname"?></span><br>
        <span> Email: <?php echo $email?></span><br>
        <span> Phone number: <?php echo $phn?></span>
    </section>
    <section>
        <a class="end" href="../acc/home.php">Home</a></section>
    </div>
</div>
</body>
</html>