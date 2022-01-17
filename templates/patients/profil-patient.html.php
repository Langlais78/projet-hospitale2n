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
            <a href="patientModify.php?id=<?= $patient['id'] ?>" class="btn btn-outline-secondary mt-4 mb-2 p-2">Modifier les informations du patient</a>           
        </div>
    </div>

</div>
