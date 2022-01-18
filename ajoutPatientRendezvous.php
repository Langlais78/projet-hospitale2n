<?php

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$pageTitle = "Ajout patient | Rendez-vous";

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

$dateHour = null;
if (!empty($_POST['dateHour'])) {
    $dateHour = $_POST['dateHour'];
}

$idPatient = null;
if (!empty($_POST['idPatient']) && ctype_digit($_POST['idPatient'])) {
    $idPatient = $_POST['idPatient'];
}

if (isset($lastname, $firstname, $birthdate, $phone, $mail) && isset($dateHour, $idPatient))  {
    
    insertPatient($lastname, $firstname, $birthdate, $phone, $mail);

    insertRendezvous($dateHour, $idPatient);

    redirect('patient.php');
    
}
else
{
    $msg = "Veuillez remplir tout les champs correctemet !";
}
render('ajout-patient-rendezvous', compact('pageTitle', 'msg'));