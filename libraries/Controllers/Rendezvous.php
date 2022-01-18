<?php

namespace Controllers;

class Rendezvous extends Controller{

    protected $nameModel = \Models\Rendezvous::class;

    public function findAll(){

        $pageTitle = 'liste rendez-vous';

        $rendezVous = $this->model->findAllRendezvous();
        
        \Renderer::render('liste-rendezvous', compact('pageTitle', 'rendezVous'));
    }

    public function findRendezvous(){

        $modelPatient = new \Models\Patient();

        $pageTitle = 'Rendez-vous';

        $rendezvous_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $rendezvous_id = $_GET['id'];
        }

        $rendezvous = $this->model->find($rendezvous_id); 

        $patient = $modelPatient->findAllpatient();

        //echo '<pre>'; print_r($patient); echo '</pre>';

        \Renderer::render('rendez-vous', compact('pageTitle', 'rendezvous_id', 'rendezvous', 'patient'));

        }

    public function delete(){
        
        $id = $_GET['id'];
        
        $rendezvous = $this->model->find($id);

        if(!$rendezvous){
            die("le rendez-vous $id n'existe pas, selectionner un rendez-vous valide");
        }
        
        $this->model->delete($id);
        
        \Http::redirect('index.php?controller=rendezvous&action=findAll');
        
    }

    public function add(){

        $modelPatient = new \Models\Patient();

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
            $this->model->insert($dateHour, $idPatient);

            \Http::redirect('index.php?controller=rendezvous&action=findAll');

            $msg = "votre rdv a été enregistrer avec success !";
        }
        else
        {
            $msg = '<span>Veuillez renseigner une date et un patient !</span>';
        }

        \Renderer::render('ajout-rendezvous', compact('pageTitle', 'patient', 'idPatient', 'msg'));


        
    }

    public function modify(){
    
        $modelPatient = new \Models\Patient();

        $pageTitle = 'Modification rendez-vous';

        $patient = $modelPatient->findAllPatient();

        $rendezvous_id = $_GET['id'];

        $rendezvous = $this->model->find($rendezvous_id);        

        if(isset($_POST['dateHour'], $_POST['idPatients']))
        {
            $this->model->modify();

            \Http::redirect('index.php?controller=rendezvous&action=findAll');
        }

        \Renderer::render('modifier-rendezvous', compact('pageTitle', 'rendezvous', 'rendezvous_id', 'patient'));

    
    }
}