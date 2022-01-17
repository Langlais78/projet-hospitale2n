<?php

require_once('libraries/Database.php');
require_once('libraries/utils.php');

$pageTitle = "Accueil";

render('index', compact('pageTitle'));
