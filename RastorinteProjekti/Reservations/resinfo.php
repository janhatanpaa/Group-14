<?php
session_start();
//Luetaan lomakkeelta tulleet tiedot funktiolla $_POST
//jos syötteet ovat olemassa
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$firstname=isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "";
$lastname=isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "";
$email=isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$phn=isset($_SESSION["phn"]) ? $_SESSION["phn"] : "";
$date=isset($_POST["date"]);
$start=isset($_POST["start"]) ? $_POST["start"] : 0;
$res_duration=isset($_POST["res_duration"]) ? $_POST["res_duration"] : "";

try{
    $yhteys=mysqli_connect("db", "root", "password", "test_db");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation info - Rastorinte</title>
</head>
<body>
    <h1>Reservation information:</h1>
    <form action="./varauksentiedot.php">
        <?php echo "Name: $firstname  $lastname"?><br>
        <?php echo "Email: $email"?><br>
        <?php echo "Phone number: $phn"?><br>
        <?php echo "Reservation date: $date"?><br>
        <?php echo "Reservation duration: $start"?><br>
        <p>Confirm reservation?</p>
    <br><input type='submit' name='ok' value='Confirm'>
        <button onclick="history.go(-1);">Cancel </button>
        </form>
</body>
</html>
