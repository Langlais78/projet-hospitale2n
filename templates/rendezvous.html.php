
<!-- affichage de la liste des rendez-vous-->
<?php if(isset($_GET['action']) && $_GET['action'] == "findAll"): ?>

    <h2 class="text-center my-5 text-primary">LISTE DES RENDEZ-VOUS</h2>

    <?php if (count($rendezVous) === 0) : ?>
        <h2 class="text-center mb-3">Il n'y a pas encore de Rendez-vous !</h2>
        <div class="text-center">
            <a href="index.php?controller=rendezvous&action=add" class="col-2 btn btn-outline-primary my-3 py-2">Ajouter un Rendez-vous</a>
        </div>
    <?php else : ?>

        <div class="text-center">
            <a href="index.php?controller=rendezvous&action=add" class="col-6 btn btn-outline-primary my-3 py-2">Ajouter un rendez-vous</a>
        </div>

        <div class="table-responsive col-6 mx-auto">
            <table id="table-liste-rendezvous" class="table table-bordered table-hover text-center">
                <thead>
                    <tr class="table table-primary"> 

                        <?php foreach($rendezVous[0] as $key => $value): ?>
                            <th><?= strtoupper($key); ?></th>                    
                        <?php endforeach; ?>

                        <td>ACTION</td>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($rendezVous as $tab): ?>
                        <tr>
                            <?php foreach($tab as $key => $value): ?>            
                                <td><?= $value ?></td>
                            <?php endforeach; ?>
                            <td>
                                <a href="index.php?controller=rendezvous&action=findRendezvous&id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table">Details</a>
                                <a href="index.php?controller=rendezvous&action=modify&id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table">Modifier</a>
                                <a href="index.php?controller=rendezvous&action=delete&id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer le Rendez-vous <?= $tab['id'] ?> <?= $tab['dateHour'] ?> ?!`)">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>


<!-- affichage du formulaire d'ajout de rendez-vous-->
<?php elseif(isset($_GET['action']) && $_GET['action'] == "add"): ?>

    <h2 class="text-center my-5 text-primary">Formulaire d'ajout de rendez-vous</h2>

    <div class="text-center my-3"><?= $msg ?></div>

    <div class="d-flex justify-content-center">
        <form action="index.php?controller=rendezvous&action=add" method="post" class="col-4 form-patient-rendezvous">

            <label for="dateHour" class="form-label">Date et Heure du rendez-vous :</label>
            <input type="datetime-local" id="" class="form-control my-2" name="dateHour" min="2022-01-01T08:00" max="2050-01-30T18:30">

            <label for="idPatient" class="form-label">Prenom et Nom du patient :</label>
            <select name="idPatient" id="" class="form-control my-2" name="idPatient">
                <option value=""></option>
                    <?php foreach($patient as $key => $value): ?>
                        <option value="<?= $value['id'] ?>"><?= $value['id'] ?>- <?= ucfirst($value['firstname']) ?> <?= strtoupper($value['lastname']) ?> -</option>
                    <?php endforeach; ?>
            </select>
            <span class="">Si votre patient n'existe pas <a href="index.php?controller=patientRendezvous&action=add" class="text-primary">Cliquez ici</a></span>

            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-primary p-2 fs-5 mt-4">VALIDER LE RENDEZ-VOUS</button>
            </div>            
        </form>
    </div>

<!-- affichage du formulaire de modification d'un rendez-vous-->
<?php elseif(isset($_GET['action']) && $_GET['action'] == "modify"): ?>

    <h2 class="text-center my-5 text-primary">Modifier le rendez-vous</h2>

    <div class="d-flex justify-content-center">
        <form action="index.php?controller=rendezvous&action=modify&id=<?= $rendezvous['id'] ?>" method="post" class="col-4 form-patient-rendezvous">

            <label for="dateHour" class="form-label">Date et Heure du rendez-vous :</label>
            <input type="datetime-local" id="" class="form-control my-2" name="dateHour" value="<?= $rendezvous['dateHour'] ?>" min="2022-01-01T08:00" max="2050-01-30T18:30">

            <label for="idPatients" class="form-label">Prenom et Nom du patient :</label>
            <select id="" class="form-control my-2" name="idPatients" value="">
                    <?php foreach($patient as $key => $value): ?>
                        <?php if($rendezvous['idPatients'] == $value['id']): ?>
                            <option value="<?= $value['id'] ?>"><?= $value['id'] ?>- <?= ucfirst($value['firstname']) ?> <?= strtoupper($value['lastname']) ?>
                        <?php endif; ?>
                        <?php if($rendezvous['idPatients'] == $value['id']): ?>
                        <?php else: ?>
                            <option value="<?= $value['id'] ?>"><?= $value['id'] ?>- <?= ucfirst($value['firstname']) ?> <?= strtoupper($value['lastname']) ?> -</option>
                        <?php endif; ?>
                    <?php endforeach; ?>
            </select>

            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-primary p-2 fs-5 mt-4">MODIFIER LE RENDEZ-VOUS</button>
            </div>        
        </form>
    </div>

<!-- affichage detaillé d'un rendez-vous-->
<?php elseif(isset($_GET['action']) && $_GET['action'] == "findRendezvous"): ?>

    <div class="text-center">
        <h2 class="mt-5">Vous avez séléctionné le rendez-vous :</h2>

        <h3 class="mb-5">N° <?= $rendezvous['id'] ?> du <?= $rendezvous['dateHour'] ?> avec le patient N° <?= $rendezvous['idPatients'] ?> :</h3>

        <div class="card mx-auto" style="width: 20rem;">
            <div class="card-body p-3"> 
                <?php foreach ($patient as $key => $value) : ?> 
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
        <a href="index.php?controller=rendezvous&action=modify&id=<?= $rendezvous['id'] ?>" class="btn btn-success mt-4">Modifier rendez-vous</a>
    </div>
    
<?php endif; ?>