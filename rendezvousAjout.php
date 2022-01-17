<?php

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$pageTitle = "ajout rendez-vous";

$patient = findAllPatient();

// echo '<pre>'; print_r($patient); echo '</pre>';

$dateHour = null;
if (!empty($_POST['dateHour'])) {
    $dateHour = $_POST['dateHour'];
}

$idPatient = null;
if (!empty($_POST['idPatient']) && ctype_digit($_POST['idPatient'])) {
    $idPatient = $_POST['idPatient'];
}
//echo '<pre>'; print_r($idPatient); echo '</pre>';

// if (!$dateHour || !$idPatient) {
//     die("Votre formulaire a été mal rempli !");
    
// }

if (isset($dateHour, $idPatient))
{
    insertRendezvous($dateHour, $idPatient);

    $msg = "votre rdv a été enregistrer avec success !";
}
else
{
    $msg = '<span>Veuillez renseigner une date et un patient !</span>';
}

render('rendez-vous/ajout-rendezvous', compact('pageTitle', 'patient', 'idPatient', 'msg'));

