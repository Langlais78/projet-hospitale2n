<?php

namespace Models;

require_once('libraries/autoload.php');

class PatientRendezvous extends Model{

    public function insertPatient(string $lastname, string $firstname, string $birthdate, string $phone, string $mail){

        $patient = $this->pdo->prepare("INSERT INTO patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail");
        $patient->execute(compact('lastname', 'firstname', 'birthdate', 'phone', 'mail'));

    }

    public function select() : array{

    $resultat = $this->pdo->query("SELECT * FROM patients WHERE id ORDER BY id DESC LIMIT 0, 1 ");
    $patient_id = $resultat->fetchAll();

    return $patient_id;

    }

    public function insertRendezvous(string $dateHour, int $idPatients){

    $rendezvous = $this->pdo->prepare("INSERT INTO appointments SET dateHour = :dateHour, idPatients = :idPatients");
    $rendezvous->execute(compact('dateHour', 'idPatients'));
    }

}

