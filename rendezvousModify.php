<?php

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$pageTitle = 'Modification rendez-vous';

$patient = findAllPatient();

$rendezvous_id = $_GET['id'];

$rendezvous = findRendezvous($rendezvous_id);

if(isset($_POST['dateHour'], $_POST['idPatients']))
{
    modifyRendezvous();

    redirect('rendezvousListe.php');
}

render('rendez-vous/modifier-rendezvous', compact('pageTitle', 'rendezvous', 'rendezvous_id', 'patient'));

// echo '<pre>'; print_r($rendezvous); echo '</pre>';
// echo '<pre>'; print_r($patient); echo '</pre>';