<?php 
session_start();

//mikäli käyttäjä ei ole kirjautuneena session id=empty, ohjaus login sivulle 
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['user_name']; ?> - Rastorinte</title>
	<link href="../../css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <a href="../../index.html"><img class="logo" src="../../assets/rastorinte.png" alt="restaurant-rastorinte"></a>
</header>
<nav>
    <div class="navbar grey topBotomBordersIn">
        <a href="../../menu.html" style="font-size: 15px;">Menu</a>
        <a href="../../index.html" style="font-size: 15px;">Home</a>
        <a href="../../gallery.html" style="font-size: 15px;">Gallery</a>
        <a href="index.php" style="font-size: 15px;">Account</a>
    </div>
</nav>
<br>
<div class="wrapper">
<form class="form3">
     <p>Signed in as user <strong><?php echo $_SESSION['user_name']; ?></strong></p>
     <h4>Hello, <?php echo $_SESSION['firstname']; ?>!</h4>
     <a href="../Reservations/poytavaraus.php" class="hlinks">Make a table reservation</a><br>
     <a href="../Reservations/myreservations.php" class="hlinks">My reservations</a><br>
     <a href="../Reservations/myinfo.php" class="hlinks">Change my information</a><br>
     <a href="../../thl.php" class="hlinks">Apply for a job</a><br>
     <a href="logout.php" class="hlinks">Sign out</a>
</form>
</div>

<br>
    <footer>
      <div class="footer">  
          <div class="row">
              <div class="column use-links">
                  <p>Rastorinte</p>
                      <p><a href="../../menu.html" style="font-size: 13px;">Menu</a></p>
                      <p><a href="../../index.html" style="font-size: 13px;">Home</a></p>
                      <p><a href="../../gallery.html" style="font-size: 13px;">Gallery</a></p>
                      <p><a href="index.php" style="font-size: 13px;">Account</a></p>
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

<?php 
}else{
     header("Location:./index.php");
     exit();
}
 ?>