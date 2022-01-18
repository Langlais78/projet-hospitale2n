<?php

namespace Controllers;

class Patient extends Controller{

    protected $nameModel = \Models\Patient::class;


    public function findAll(){

        $pageTitle = "Affichage patients";
        $patients = $this->model->findAllPatient();
        \Renderer::render('patient', compact('pageTitle', 'patients'));

    }

    public function add(){

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
            
            $this->model->insert($lastname, $firstname, $birthdate, $phone, $mail);

            \Http::redirect('index.php?controller=patient&action=findAll');
            
        }
        else
        {
            $msg = "Veuillez remplir tout les champs correctemet !";
        }

        \Renderer::render('patient', compact('pageTitle', 'msg'));
        
    }

    public function delete(){

        $modelRendezvous = new \Models\Rendezvous();

        $id = $_GET['id'];

        $modelRendezvous->deleteAllRendezvousPatient($id);

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $patient = $this->model->find($id);
            if(!$patient){
                die("le patient $id n'existe pas, selectionner un patient existant !!!");
            }
            
        $this->model->delete($id);

        \Http::redirect('index.php?controller=patient&action=findAll');
        
    }

    public function modify(){

        $pageTitle = "modifier patient";

        $patient_id = $_GET['id'];

        $patient = $this->model->find($patient_id);        

        if(isset($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']))
        {
            $this->model->modify();

            \Http::redirect('index.php?controller=patient&action=findAll');
        }

        \Renderer::render('patient', compact('pageTitle', 'patient', 'patient_id'));       
        
    }

    public function profil(){

        $modelRendezvous = new \Models\Rendezvous();

        $id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        $patient = $this->model->find($id);

        $rendezvous = $modelRendezvous->findRendezvousPatient($id);
        
        //echo '<pre>'; print_r($rendezvous); echo '</pre>';

        $pageTitle = 'Profil patient';

        \Renderer::render('patient', compact('pageTitle', 'patient', 'id', 'rendezvous'));

    }

}