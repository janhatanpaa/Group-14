<?php 
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//yhteyden muodostus tietokantaan
include ("./connectdb.php");
//sessioniin tallentuneet käyttäjätiedot 
$firstname=isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "";
$lastname=isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "";
$email=isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$phn=isset($_SESSION["phn"]) ? $_SESSION["phn"] : "";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../assets/rastorintefavicon.png">
    <link href="../../css/reservations.css" rel="stylesheet" type="text/css">
    <title>My information - Rastorinte</title>
    <style>             
    table, td, th {
        padding: 5px;   
    }

    th {
        background-color: #494949ac;
        color: white;
        box-shadow: 5px 10px 18px #888888;
        font-weight: 100;
    }

    td {
        background-color: #ffffff89;
        box-shadow: 5px 10px 18px #888888;
    }

    table {
        width: 30%;
        border-collapse: collapse;
    }

    input {
        text-align: center;
    }

    input:hover {
        background-color: white;
        color: black;
    }
    </style>
</head>
<header>
    <a href="../../index.html"><img class="logo" src="../../assets/rastorinte.png" alt="restaurant-rastorinte"></a>
</header>
<!--window.onload funktio lataa sivun lomakkeen kohdalle-->
<script>
window.onload = function(){
    window.scrollTo(320, 320);
}
</script>
<nav>
    <div class="navbar grey topBotomBordersIn">
        <a href="../../menu.html" style="font-size: 15px;">Menu</a>
        <a href="../../index.html" style="font-size: 15px;">Home</a>
        <a href="../../gallery.html" style="font-size: 15px;">Gallery</a>
        <a href="../../rastorinteprojekti/acc/index.php" style="font-size: 15px;">Account</a>
    </div>
</nav>
<div class="res_form grey center">
    <div class="res_form2">
<h1>My information</h1>
<!--submit lähettää tiedot updateinfo.php, jossa tietokantaan päivittyy muutokset-->
<form action="updateinfo.php" method="post">
<table>
<table>
  <tr>
    <th>First name</th>
  </tr>
  <tr>
    <td><input name="firstname" type="text" value="<?php echo $firstname ?>"></td>
  </tr>
  </table>
  <table>
  <tr>
    <th>Last name</th>
  </tr>
  <tr>
    <td><input name="lastname" type="text" value="<?php echo $lastname ?>"></td>
  </tr>
  </table>
  <table>
  <tr>
    <th>Email</th>
  </tr>
  <tr>
    <td><input name="email" type="text" value="<?php echo $email ?>"></td>
  </tr>
  </table>
  <table>
  <tr>
    <th>Phone number</th>
  </tr>
  <tr>
    <td><input name="phn" type="text" value="<?php echo $phn ?>"></td>
  </tr>
</table>
  <table> 
</table>
<section>
    <!--submit lähettää tiedot, jolloin tietokantaan päivittyy muutokset-->
    <button class="end"><input class="end" type="submit" value="Submit"></a></button>
</section>
</form>
<!--history.go(-1) palaa yhden sivun taaksepäin-->
<button class="cancel" onclick="history.go(-1);">&#129136; Cancel</button> 
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
                      <p><a href="../../rastorinteprojekti/acc/index.php" style="font-size: 13px;">Account</a></p>
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