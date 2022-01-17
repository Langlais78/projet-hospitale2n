<?php

require_once('libraries/Database.php');
require_once('libraries/utils.php');

//echo '<pre>'; print_r($_POST); echo '</pre>';

$pageTitle = "Ajout patients";



$lastname = null;
if (!empty($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
}


$firstname = null;
if (!empty($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
}

$birthdate = null;
if (!empty($_POST['birthdate'])) {
    $birthdate = $_POST['birthdate'];
}

$phone = null;
if (!empty($_POST['phone'])) {
    $phone = $_POST['phone'];
}

$mail= null;
if (!empty($_POST['mail'])) {
    $mail = $_POST['mail'];
}

if (isset($lastname, $firstname, $birthdate, $phone, $mail)) {
    
    insertPatient($lastname, $firstname, $birthdate, $phone, $mail);

    redirect('patient.php');
    
}
else
{
    $msg = "Veuillez remplir tout les champs correctemet !";
}
render('patients/ajout-patient', compact('pageTitle', 'msg'));


    