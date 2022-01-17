<?php

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$pageTitle = "modifier profil";

$patient_id = $_GET['id'];

$patient = findPatient($patient_id);

if(isset($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']))
{
    modifyPatient();

    redirect('patient.php');
}

render('patients/modif-patient', compact('pageTitle', 'patient', 'patient_id'));
//echo '<pre>'; print_r($patient); echo '</pre>';

