<div class="text-center">

    <h2 class="mt-5">Vous avez séléctionné le rendez-vous :</h2>

    <h3 class="mb-5">N° <?= $rendezvous['id'] ?> du <?= $rendezvous['dateHour'] ?> patient <?= $rendezvous['idPatients'] ?></h3>
    
    <div class="card mx-auto" style="width: 20rem;">
        <div class="card-body p-3"> 
            <?php foreach ($patient as $value) : ?> 
                <?php if( $value['id'] == $rendezvous['idPatients'] ):  ?>        
                    <h5 class="card-title my-4">Nom : <?= strtoupper($value['lastname']) ?></h5>
                    <h6 class="card-subtitle my-4 ">Prenom : <?= ucfirst($value['firstname']) ?></h6>
                    <h6 class="card-subtitle my-4">Date de naissance : <?= $value['birthdate'] ?></h6>
                    <h6 class="card-subtitle my-4">N° Telephone : <?= $value['phone'] ?></h6>
                    <h6 class="card-subtitle my-4">Adresse email : <?= $value['mail'] ?></h6>
                <?php endif ?>  
            <?php endforeach ?>       
        </div>
    </div>
    
</div>