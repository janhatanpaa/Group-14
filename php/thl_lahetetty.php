<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>123</p>
    <?php if ($_POST['arvo']<0){
    print "Ulkona on pakkasta.";
}
else if ($_POST['arvo'] >= 0 && $_POST['arvo']<5){
    print "Ulkona on kolea sää.";
}
else if ($_POST['arvo'] >= 5 && $_POST['arvo']<15){
    print "Ulkona on tyypillinen kesäsää.";
}
else if ($_POST['arvo'] >= 15 && $_POST['arvo']<20){
    print "Ulkona on melko lämmin.";
}
else if ($_POST['arvo'] >= 20 && $_POST['arvo']<25){
    print "Ulkona on kaunis kesäilma.";
}
else{
    print "Ulkona on helle";
}


?>
</body>
</html>