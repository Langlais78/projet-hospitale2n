<?php

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$pageTitle = "Affichage patients";

$patients = findAllPatient();

render('patients/liste-patient', compact('pageTitle', 'patients'));