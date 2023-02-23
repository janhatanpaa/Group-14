<?php
session_start();

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
//Luetaan lomakkeelta tulleet tiedot funktiolla $_POST
//jos syötteet ovat olemassa
$id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$fn=isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "";
$ln=isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "";
$em=isset($_SESSION['email']) ? $_SESSION['email'] : "";
$ph=isset($_SESSION['phn']) ? $_SESSION['phn'] : "";
$firstname=isset($_POST["firstname"]) ? $_POST["firstname"] : "";
$lastname=isset($_POST["lastname"]) ? $_POST["lastname"] : "";
$email=isset($_POST["email"]) ? $_POST["email"] : "";
$phn=isset($_POST["phn"]) ? $_POST["phn"] : "";

//if-else toistolauseella mikäli $_POST funktiolla tiedot tyhjät, eli taulukossa oleva tieto jätetty tyhjäksi, 
//pysyy tieto samana kuin $_SESSION funktiolla ollut alkuperäinen arvo
if (empty($firstname)){
    $firstname=$_SESSION['firstname'];
}
else {
    $_SESSION['firstname']=$firstname;
}
if (empty($lastname)){
    $lastname=$_SESSION['lastname'];
}
else {
    $_SESSION['lastname']=$lastname;
}
if (empty($email)){
    $email=$_SESSION['email'];
}
else {
    $_SESSION['email']=$email;
}
if (empty($phn)){
    $phn=$_SESSION['phn'];
}
else {
    $_SESSION['phn']=$phn;
}


//yhteyden muodostus tietokantaan
include ("./connectdb.php");

$sql="update users set firstname=?, lastname=?, email=?, phn=? where user_id=$id";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'ssss', $firstname, $lastname, $email, $phn);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);

header("Location:./myinfo.php");
?>