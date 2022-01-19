<?php

namespace Controllers;

class PatientRendezvous extends Controller{

    protected $nameModel = \Models\PatientRendezvous::class;

    public function add(){

        $pageTitle = "Ajout Patient | Rendez-vous";

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

        if (isset($lastname, $firstname, $birthdate, $phone, $mail)){
            $this->model->insertPatient($lastname, $firstname, $birthdate, $phone, $mail);
        }

        $id = $this->model->select();

        $dateHour = null;
        if (!empty($_POST['dateHour'])) {
            $dateHour = $_POST['dateHour'];
        }
        
        $idPatients = null;
        if (!empty($_POST['idPatients'])) {
            $idPatients = $_POST['idPatients'];
        }

        if (isset($dateHour, $idPatients)) {
            
            $this->model->insertRendezvous($dateHour, $idPatients);

            \Http::redirect('index.php?controller=patient&action=findAll');
            
        }
        else
        {
            $msg = "<span class='text-danger'>Veuillez remplir tout les champs correctement !</span>";
        }
        
        \Renderer::render('patientRendezvous', compact('pageTitle', 'msg', 'id'));


    }


}