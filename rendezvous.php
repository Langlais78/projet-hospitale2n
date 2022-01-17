<?php 

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$pageTitle = 'Rendez-vous';

$rendezvous_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $rendezvous_id = $_GET['id'];
}

$rendezvous = findRendezvous($rendezvous_id); 

$patient_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $patient_id = $_GET['id'];
}

$patient = findAllPatient($patient_id);

render('rendez-vous/rendez-vous', compact('pageTitle', 'rendezvous_id', 'rendezvous', 'patient', 'patient_id'));