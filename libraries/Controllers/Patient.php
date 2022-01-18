<?php

namespace Controllers;

require_once('libraries/utils.php');
require_once('libraries/Models/Patient.php');
require_once('libraries/Models/Rendezvous.php');

class Patient{


    public function findAll(){

        $model = new \Models\Patient();
        $pageTitle = "Affichage patients";
        $patients = $model->findAllPatient();
        render('patients/liste-patient', compact('pageTitle', 'patients'));

    }


    public function add(){

        $model = new \Models\Patient();

        $pageTitle = "Ajout patients";

        $lastname = null;
        if (!empty($_POST['lastname'])) {
            $lastname = $_POST['lastname'];
        }

        $firstname = null;
        if (!empty($_POST['firstname'])) {
            $firstname = $_POST['firstname'];
        }

        $birthdate = null;
        if (!empty($_POST['birthdate'])) {
            $birthdate = $_POST['birthdate'];
        }

        $phone = null;
        if (!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
        }

        $mail= null;
        if (!empty($_POST['mail'])) {
            $mail = $_POST['mail'];
        }

        if (isset($lastname, $firstname, $birthdate, $phone, $mail)) {
            
            $model->insert($lastname, $firstname, $birthdate, $phone, $mail);

            redirect('patient.php');
            
        }
        else
        {
            $msg = "Veuillez remplir tout les champs correctemet !";
        }

        render('patients/ajout-patient', compact('pageTitle', 'msg'));
        
    }

    public function delete(){

        $modelPatient = new \Models\Patient();
        $modelRendezvous = new \Models\Rendezvous();

        $id = $_GET['id'];

        $modelRendezvous->deleteAllRendezvousPatient($id);

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $patient = $modelPatient->find($id);
            if(!$patient){
                die("le patient $id n'existe pas, selectionner un patient existant !!!");
            }
            
        $modelPatient->delete($id);

        redirect('index.php');
        
    }

    public function modify(){

        $model = new \Models\Patient();

        $pageTitle = "modifier profil";

        $patient_id = $_GET['id'];

        $patient = $model->find($patient_id);

        if(isset($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']))
        {
            $model->modify();

            redirect('patient.php');
        }

        render('patients/modif-patient', compact('pageTitle', 'patient', 'patient_id'));
        
    }

    public function profil(){

        $modelPatient = new \Models\Patient();
        $modelRendezvous = new \Models\Rendezvous();

        $id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        $patient = $modelPatient->find($id);

        $rendezvous = $modelRendezvous->findRendezvousPatient($id);
        
        //echo '<pre>'; print_r($rendezvous); echo '</pre>';

        $pageTitle = 'Profil patient';

        render('patients/profil-patient', compact('pageTitle', 'patient', 'id', 'rendezvous'));

    }

}