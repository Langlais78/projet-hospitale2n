<?php 

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$patient_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $patient_id = $_GET['id'];
}

if (!$patient_id) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}

$patient = findPatient($patient_id);


$pageTitle =  'Profil patient';

render('patients/profil-patient', compact('pageTitle', 'patient', 'patient_id'));
