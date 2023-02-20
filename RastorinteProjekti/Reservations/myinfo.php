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
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My information - Rastorinte</title>
    <style>
        table, tr, td {
            border: 1px solid black;
        }
    </style>
</head>
<h1>My information</h1>
<table>
  <tr>
    <td>First name</td>
    <td><?php echo $firstname ?></td>
    <td><button>Edit</button></td>
  </tr>
  <tr>
    <td>Last name</td>
    <td><?php echo $lastname ?></td>
    <td><button>Edit</button></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $email ?></td>
    <td><button>Edit</button></td>
  </tr>
  <tr>
    <td>Phone number</td>
    <td><?php echo $phn ?></td>
    <td><button>Edit</button></td>
  </tr>
</table> 
<a href="../acc/home.php">My page</a>
</body>
</html>