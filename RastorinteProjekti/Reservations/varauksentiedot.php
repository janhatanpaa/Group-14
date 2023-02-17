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
    window.scrollTo(500, 500);
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
<img class="reserveimg" src="../../assets/reserve2.jpg" alt="">
    <h1>Thank you for your reservation!</h1>
    <h2>Reservation information:</h2>
    <?php
    echo "<p style=font-family: 'Abel, serif';'color:white'> Name: $firstname $lastname </p>";
    echo "<p style='color:white'> Email: $email </p>";
    echo "<p style='color:white'> Phone number: $phn </p>";
    echo "<p style='color:white'> Reservation starting date and time: $date $start </p>";
    echo "<p style='color:white'> Reservation duration: $res_duration </p>";
    ?>
    <a href="../home.php">My page</a>
    </div>
</body>
</html>