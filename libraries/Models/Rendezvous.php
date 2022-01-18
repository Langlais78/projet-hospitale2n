<?php

namespace Models;

require_once('libraries/autoload.php');

class Rendezvous extends Model{

    protected $table = "appointments";
   

    public function insert(string $dateHour, int $idPatient) : void{        

        $query = $this->pdo->prepare("INSERT INTO appointments SET dateHour = :dateHour, idPatients = :idPatient");
        $query->execute(compact('dateHour', 'idPatient'));

    } 

    public function findAllRendezvous(){

        $resultats = $this->pdo->query('SELECT * FROM appointments ORDER BY dateHour ASC');
        $rendezVous = $resultats->fetchAll();

        return $rendezVous;

    }
    
    public function find(int $id){

        $query = $this->pdo->prepare("SELECT * FROM appointments WHERE id = :rendezvous_id");
        $query->execute(['rendezvous_id' => $id]);
        $rendezvous = $query->fetch();

        return $rendezvous;

    }

    public function findRendezvousPatient(int $id){

        $query = $this->pdo->prepare("SELECT * FROM appointments WHERE idPatients = :idPatients");
        $query->execute(['idPatients' => $id]);
        $rendezvous = $query->fetchAll();

        return $rendezvous;

    }


    public function modify(){

        $query = $this->pdo->prepare("UPDATE appointments SET dateHour = :dateHour, idPatients = :idPatients WHERE id = :rendezvous_id");
        $query->bindValue(':rendezvous_id', $_GET['id']);
        $query->bindValue(':dateHour', $_POST['dateHour']);
        $query->bindValue(':idPatients', $_POST['idPatients']);

        $query->execute();

    }    

    public function deleteAllRendezvousPatient(int $id) : void{

        $query = $this->pdo->prepare('DELETE FROM appointments WHERE idPatients = :id_patient');
        $query->execute(['id_patient' => $id]);
    }

}