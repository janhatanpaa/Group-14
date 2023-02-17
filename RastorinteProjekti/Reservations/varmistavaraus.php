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
    <title>Document</title>
</head>
<body>
    <h1>Table reservation information:</h1>
    <?php
    echo "Name: $firstname $lastname<br>";
    echo "Email: $email <br>";
    echo "Phone number: $phn <br>";
    echo "Reservation starting date and time: $date $start<br>";
    echo "Reservation duration: $res_duration <br>";
    ?>
    <h3>Do you want to confirm the reservation?</h3>
    <form action="teevaraus.php" method='post'>
    <input type='submit' name='ok' value='Confirm reservation'>
        <button onclick="history.go(-1);">Cancel </button>
    </form>
</body>
</html>