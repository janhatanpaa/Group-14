<?php 
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['user_name']; ?> - Rastorinte</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <p>Signed in as user <strong><?php echo $_SESSION['user_name']; ?></strong></p>
     <h1>Hello, <?php echo $_SESSION['firstname']; ?>!</h1>
     <a href="../RastorinteProjekti/Reservations/poytavaraus.html">Make a table reservation</a><br>
     <a href="varaukset.html">My reservations</a><br>
     <a href="Reservations/myinfo.php">Change my information</a><br>
     <a href="../thl.html">Apply for a job</a><br>
     <a href="logout.php">Sign out</a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>