<?php

namespace Models;

require_once('libraries/autoload.php');

class Patient extends Model{ 
    
    protected $table = "patients";

    public function findAllPatient() : array{

        $resultats = $this->pdo->query("SELECT * FROM patients ORDER BY id DESC");
        $patients = $resultats->fetchAll();

        return $patients;

    }
    
    public function find(int $id){

        $query = $this->pdo->prepare("SELECT * FROM patients WHERE id = :patient_id");
        $query->execute(['patient_id' => $id]);
        $patient = $query->fetch();

        return $patient;

    }    

    public function insert(string $lastname, string $firstname, string $birthdate, string $phone, string $mail){

        $query = $this->pdo->prepare("INSERT INTO patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail");
        $query->execute(compact('lastname', 'firstname', 'birthdate', 'phone', 'mail'));

    }

    public function modify(){

        $query = $this->pdo->prepare("UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id = :patient_id");

        $query->bindValue(':patient_id', $_GET['id']);
        $query->bindValue(':lastname', $_POST['lastname']);
        $query->bindValue(':firstname', $_POST['firstname']);
        $query->bindValue(':birthdate', $_POST['birthdate']);
        $query->bindValue(':phone', $_POST['phone']);
        $query->bindValue(':mail', $_POST['mail']);
        $query->execute();

    }


}