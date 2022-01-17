<?php

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$pageTitle = "Suppression patient";

$id = $_GET['id'];

deleteAllRendezvous($id);

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ?! Tu n'as pas précisé l'id de l'article !");
}

$patient = findPatient($id);
    if(!$patient){
        die("le patient $id n'existe pas, selectionner un patient existant !!!");
    }
    
deletePatient($id);

redirect('index.php');