<?php
//yhteyden muodostus tietokantaan, liitetään muihin sivustoihin includella
try{
    $yhteys=mysqli_connect("db", "root", "password", "test_db");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}
?>
