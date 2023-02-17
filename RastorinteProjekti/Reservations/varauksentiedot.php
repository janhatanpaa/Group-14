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
    $firstname=isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "";
    $lastname=isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "";
    $email=isset($_SESSION["email"]) ? $_SESSION["email"] : "";
    $phn=isset($_SESSION["phn"]) ? $_SESSION["phn"] : "";
    $date=isset($_SESSION['date']) ? $_SESSION['date'] : "";
    $start=isset($_SESSION['start']) ? $_SESSION['start'] : "";
    $res_duration=isset($_SESSION['res_duration']) ? $_SESSION['res_duration'] : "";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/reservations.css" rel="stylesheet" type="text/css">

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
    </div>
</nav>
<nav>
<div class="res_form grey center">
<div class="res_form2">
<img class="reserveimg" src="../../assets/reserve2.jpg" alt="">
    <h1>Thank you for your reservation!</h1>
    <h4>Table reservation details:</h4>
    <span> Reservation date and time: <?php echo "$date $start"?></span><br>
    <span> Reservation duration: <?php echo $res_duration?></span><br>
    <h4>Contact details:</h4>
    <span> Name: <?php echo "$firstname $lastname"?></span><br>
    <span> Email: <?php echo $email?></span><br>
    <span> Phone number: <?php echo $phn?></span><br><br><br>
    <a class="end" href="../home.php">Home</a>
    </div>
</div>
</body>
</html>