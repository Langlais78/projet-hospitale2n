<?php 

    function getPdo() :PDO
    {
     $bdd = new PDO('mysql:host=localhost;dbname=hospitale2n;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC    
    ]);

    return $bdd;
    }


    function insertPatient(string $lastname, string $firstname, string $birthdate, string $phone, string $mail){

        $pdo = getPdo();

        $query = $pdo->prepare("INSERT INTO patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail");
        $query->execute(compact('lastname', 'firstname', 'birthdate', 'phone', 'mail'));

        
    }

    function modifyPatient(){

        $pdo = getPdo();

        $query = $pdo->prepare("UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id = :patient_id ");

        $query->bindValue(':patient_id', $_GET['id'], PDO::PARAM_INT);
        $query->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $query->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $query->bindValue(':birthdate', $_POST['birthdate'], PDO::PARAM_STR);
        $query->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
        $query->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);

        $query->execute();

    }

    function findAllPatient() : array{

        $pdo = getPdo();

        $resultats = $pdo->query('SELECT * FROM patients ORDER BY id DESC');
        $patients = $resultats->fetchAll();

        return $patients;

    }

    function findPatient(int $id){

        $pdo = getPdo();

        $query = $pdo->prepare("SELECT * FROM patients WHERE id = :patient_id");
        $query->execute(['patient_id' => $id]);
        $patient = $query->fetch();

        return $patient;

    }

    function insertRendezvous(string $dateHour, int $idPatient) : void{

        $pdo = getPdo();        

        $query = $pdo->prepare("INSERT INTO appointments SET dateHour = :dateHour, idPatients = :idPatient");
        $query->execute(compact('dateHour', 'idPatient'));

        
    }

    function findAllRendezvous(){

        $pdo = getPdo();

        $resultats = $pdo->query('SELECT * FROM appointments ORDER BY dateHour ASC');
        $rendezVous = $resultats->fetchAll();

        return $rendezVous;

    }

    function findRendezvous(int $id) : array{

        $pdo = getPdo();

        $query = $pdo->prepare("SELECT * FROM appointments WHERE id = :rendezvous_id");
        $query->execute(['rendezvous_id' => $id]);
        $rendezvous = $query->fetch();

        return $rendezvous;

    }
?>