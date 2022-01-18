<div class="text-center">

    <h2 class="mt-5">Vous avez séléctionné le patient :</h2>

    <h3 class="mb-5">N° <?= $patient['id'] ?></h3>

    <div class="card mx-auto" style="width: 20rem;">
        <div class="card-body p-3">            
            <h5 class="card-title my-4">Nom : <?= strtoupper($patient['lastname']) ?></h5>
            <h6 class="card-subtitle my-4 ">Prenom : <?= ucfirst($patient['firstname']) ?></h6>
            <h6 class="card-subtitle my-4">Date de naissance : <?= $patient['birthdate'] ?></h6>
            <h6 class="card-subtitle my-4">N° Telephone : <?= $patient['phone'] ?></h6>
            <h6 class="card-subtitle my-4">Adresse email : <?= $patient['mail'] ?></h6> 
            <a href="index.php?controller=patient&action=modify&id=<?= $patient['id'] ?>" class="btn btn-outline-secondary mt-4 mb-2 p-2">Modifier les informations du patient</a>           
        </div>
    </div>

    <div class="mx-auto col-8 d-flex flex-row flex-wrap justify-content-around">
    <?php foreach($rendezvous as $value): ?>        
        <div class="card mx-2 mb-3 mt-5 bg-info text-white" style="width: 20rem;">
            <div class="card-body p-3"> 
                <h5 class="card-title my-4">id rdv : <?= $value['id'] ?></h5>           
                <h5 class="card-title my-4">date rdv : <?= $value['dateHour'] ?></h5>
                <h5 class="card-title my-4">id : <?= $value['idPatients'] ?></h5>                   
                <a href="index.php?controller=rendezvous&action=modify&id=<?= $value['id'] ?>" class="btn btn-outline-light mt-4 mb-2 p-2">Modifier le rendez-vous</a>           
            </div>
        </div>        
    <?php endforeach; ?>
    </div>

</div>
