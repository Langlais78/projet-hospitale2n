<?php
require_once ('libraries/Database.php');
require_once ('libraries/utils.php');

$pageTitle = 'liste rendez-vous';

$rendezVous = findAllRendezvous();

render('rendez-vous/liste-rendezvous', compact('pageTitle', 'rendezVous'));