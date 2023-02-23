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
$date=isset($_SESSION['date']) ? $_SESSION['date'] : "";
$start=isset($_SESSION['start']) ? $_SESSION['start'] : "";
$res_duration=isset($_SESSION['res_duration']) ? $_SESSION['res_duration'] : "";
$table=isset($_SESSION["table"]) ? $_SESSION["table"] : "";
$guest_amount=$_SESSION["table"];
$duration=$_SESSION['res_duration'];

//muutetaan lomakkeista value-hinta if-else ehtolauseilla 
//oleellisempaan vierasmäärä & varauksenkesto muotoon, jotka tallennetaan tietokantaan
if ($guest_amount=="5") {
    $guest_amount="1-2 guests";
}
else if ($guest_amount=="8"){
    $guest_amount="3-4 guests";
}
else if ($guest_amount=="15"){
    $guest_amount="4-8 guests";
}
else if ($guest_amount=="25"){
    $guest_amount="8-16 guests";
}
else {
    $guest_amount="+16 guests";
}
?>
<?php
if ($duration=="10") {
    $duration="1 hour";
}
else if ($duration=="15"){
    $duration="2 hours";
}
else if ($duration=="25"){
    $duration="3 hours";
}
else {
    $duration="4 hours";
}
//Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
//joihin laitetaan muuttujien arvoja
$sql="insert into reservations (user_id, firstname, lastname, email, phn, date, start, res_duration, guest_amount) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'issssssss', $id, $firstname, $lastname, $email, $phn, $date, $start, $duration, $guest_amount);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);
header("Location:./varauksentiedot.php");
?>