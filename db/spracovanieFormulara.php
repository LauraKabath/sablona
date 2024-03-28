<?php

require_once('../classes/Kontakt.php');
use formular\Kontakt;

$meno = $_POST['meno'];
$email = $_POST['email'];
$sprava = $_POST['sprava'];

//Overenie udajov
if (empty($meno) || empty($email) || empty($sprava)){
    die("Chyba: Vsetky polia su povinne");
}

//Ulozenie spravy do databazy
$kontakt = new Kontakt();
$ulozene = $kontakt->ulozitSpravu($meno, $email, $sprava);

if ($ulozene){
    header('Location: ../thankyou.php');
} else {
    die('Chyba pri odosielani spravy do databazy!');
    http_response_code(404);
}