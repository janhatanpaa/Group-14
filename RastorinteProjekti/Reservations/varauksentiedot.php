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
</head>
<body>
 
    <h1>Thank you for your reservation!</h1>
    <p>Reservation information:</p>
    <?php
    echo "Name: $firstname $lastname<br>";
    echo "Email: $email <br>";
    echo "Phone number: $phn <br>";
    echo "Reservation starting date and time: $date $start<br>";
    echo "Reservation duration: $res_duration <br>";
    ?>
    <a href="../home.php">My page</a>
</body>
</html>