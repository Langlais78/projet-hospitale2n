<?php

namespace Controllers;

require_once('libraries/utils.php');
require_once('libraries/Models/Rendezvous.php');
require_once('libraries/Models/Patient.php');

class Rendezvous{

    public function findAll(){

        $model = new \Models\Rendezvous();

        $pageTitle = 'liste rendez-vous';

        $rendezVous = $model->findAllRendezvous();
        
        render('rendez-vous/liste-rendezvous', compact('pageTitle', 'rendezVous'));
    }

    public function findRendezvous(){

        $modelPatient = new \Models\Patient();
        $modelRendezvous = new \Models\Rendezvous();

        $pageTitle = 'Rendez-vous';

        $rendezvous_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $rendezvous_id = $_GET['id'];
        }

        $rendezvous = $modelRendezvous->find($rendezvous_id); 

        $patient = $modelPatient->findAllpatient();

        //echo '<pre>'; print_r($patient); echo '</pre>';

        render('rendez-vous/rendez-vous', compact('pageTitle', 'rendezvous_id', 'rendezvous', 'patient'));

        }

    public function delete(){

        $model = new \Models\Rendezvous();
        
        $id = $_GET['id'];
        
        $rendezvous = $model->find($id);
            if(!$rendezvous){
                die("le rendez-vous $id n'existe pas, selectionner un rendez-vous valide");
            }
        
        $model->delete($id);
        
        redirect('index.php');
        
    }

    public function add(){

        $modelPatient = new \Models\Patient();
        $modelRendezvous = new \Models\Rendezvous();

        $pageTitle = "ajout rendez-vous";

        $patient = $modelPatient->findAllPatient();

        // echo '<pre>'; print_r($patient); echo '</pre>';

        $dateHour = null;
        if (!empty($_POST['dateHour'])) {
            $dateHour = $_POST['dateHour'];
        }

        $idPatient = null;
        if (!empty($_POST['idPatient']) && ctype_digit($_POST['idPatient'])) {
            $idPatient = $_POST['idPatient'];
        }

        if (isset($dateHour, $idPatient))
        {
            $modelRendezvous->insert($dateHour, $idPatient);

            $msg = "votre rdv a été enregistrer avec success !";
        }
        else
        {
            $msg = '<span>Veuillez renseigner une date et un patient !</span>';
        }

        render('rendez-vous/ajout-rendezvous', compact('pageTitle', 'patient', 'idPatient', 'msg'));


        
    }

    public function modify(){
    
        $modelPatient = new \Models\Patient();
        $modelRendezvous = new \Models\Rendezvous();

        $pageTitle = 'Modification rendez-vous';

        $patient = $modelPatient->findAllPatient();

        $rendezvous_id = $_GET['id'];

        $rendezvous = $modelRendezvous->find($rendezvous_id);

        if(isset($_POST['dateHour'], $_POST['idPatients']))
        {
            $modelRendezvous->modify();

            redirect('rendezvousListe.php');
        }

        render('rendez-vous/modifier-rendezvous', compact('pageTitle', 'rendezvous', 'rendezvous_id', 'patient'));

    
    }
}