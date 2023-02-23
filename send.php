<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// koodi lähtee käyntiin kun thl.php sivustosta painetaan nappulaa
if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rastorinte@gmail.com';
    $mail->Password = 'gwiwddzzapqhwuwc';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;


    $mail->setFrom('rastorinte@gmail.com');

    $mail->addAddress('rastorinte@gmail.com');
    
    $mail->isHTML(true);

    // Sähköpostin aihe
    $mail->Subject = "Work application";

    // Sähköpostin viesti, johon liittyy lomakkeesta nimi, sukunimi, sähköposti, puhelinnumero ja viesti.
    $mail->Body = 'Name: ' . $_POST["name"] . '<br>' . 
    'Last Name: ' . $_POST["lastname"] . '<br>' .
    'Email: ' . $_POST["email"] . '<br>' .
    'Phone number: ' . $_POST["phone"] . '<br>' .
    'Information about the person: ' . $_POST["message"];

    $mail->send();

    // kun sähköposti lähtee liikkeelle. Näytölle tulostuu teksti "Sent Succesfully"
    echo
    "
    <script>
    alert('Sent Succesfully');
    document.location.href = 'thl.php';
    </script>
    
    ";

}
?>