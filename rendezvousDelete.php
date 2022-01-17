<?php

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$pageTitle = "Suppression rendez-vous";

$id = $_GET['id'];

$rendezvous = findRendezvous($id);
    if(!$rendezvous){
        die("le rendez-vous $id n'existe pas, selectionner un rendez-vous valide");
    }

deleteRendezvous($id);

redirect('index.php');