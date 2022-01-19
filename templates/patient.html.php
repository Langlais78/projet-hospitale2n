
<!-- affichage de la liste des patient -->
<?php if(isset($_GET['action']) && $_GET['action'] == "findAll"): ?>

  <h1 class="text-center mt-3 mb-5 text-primary">LISTE DES PATIENTS</h1>

  <?php if (count($patients) === 0) : ?>
    <h2 class="text-center mb-3">Il n'y a pas encore de Patient !</h2>
    <div class="text-center">
      <a href="index.php?controller=patient&action=add" class="col-2 btn btn-outline-primary my-3 py-2">Ajouter un patient</a>
    </div>
  <?php else : ?>

    <div class="text-center">
      <a href="index.php?controller=patient&action=add" class="col-8 btn btn-outline-primary my-3 py-2">Ajouter un patient</a>
    </div>

    <div class="table-responsive col-8 mx-auto">
      <table id="table-liste-patient" class="table table-bordered table-hover text-center">
        <thead>
          <tr class="table table-info">
            <?php foreach($patients[0] as $key => $value): ?>
              <th><?= strtoupper($key); ?></th>          
            <?php endforeach; ?>
              <td>ACTION</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach($patients as $tab): ?>
            <tr>
              <?php foreach($tab as $key => $value): ?>
                <?php if ($key == 'lastname'): ?>
                  <td><?= strtoupper($value) ?></td>
                <?php elseif ($key == 'firstname'): ?>
                  <td><?= ucfirst($value) ?></td>
                <?php else: ?>
                  <td><?= $value ?></td>
                <?php endif; ?> 
              <?php endforeach; ?>
                  <td>
                    <a href="index.php?controller=patient&action=profil&id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table">Details</a>
                    <a href="index.php?controller=patient&action=modify&id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table">Modifier</a>
                    <a href="index.php?controller=patient&action=delete&id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer le patient <?= $tab['lastname'] ?> <?= $tab['firstname'] ?> ?!`)">Supprimer</a>
                  </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>


<!-- affichage du formulaire d'ajout de patient -->
<?php elseif(isset($_GET['action']) && $_GET['action'] == "add"): ?>
    
  <h1 class="text-center my-5">Formulaire d'ajout de patient</h1>

  <div class="text-center my-3"><?= $msg ?></div>
      
    <form action="index.php?controller=patient&action=add" method="POST" class="col-4 mx-auto form-patient-ajout">          
        <label for="lastname" class="form-label">Nom :</label>
        <input type="text" class="form-control" name="lastname">

        <label for="firstname" class="form-label">Prenom :</label>
        <input type="text" class="form-control" name="firstname">

        <label for="birthdate" class="form-label">Date de naissance :</label>
        <input type="date" class="form-control" name="birthdate">

        <label for="phone" class="form-label">Telephone :</label>
        <input type="text" class="form-control" name="phone">

        <label for="mail" class="form-label">email :</label>
        <input type="email" class="form-control" name="mail">

        <div class="d-flex justify-content-center">
            <button class="btn btn-secondary py-1 px-4 my-4 ">Ajouter</button>
        </div>
    </form>

  <div class="text-center my-4">
      <a href="index.php?controller=patient&action=findAll" class="col-4 btn btn-outline-primary p-2">Afficher les patients</a>
  </div>


<!-- affichage du formulaire de modification de patient -->
<?php elseif(isset($_GET['action']) && $_GET['action'] == "modify"): ?>

  <h2 class="text-center my-5">Modification des informations du patient N° <?= $patient['id']?></h2>

  <form action="index.php?controller=patient&action=modify&id=<?= $patient['id'] ?>" method="POST" class="col-4 mx-auto form-patient-modif">
      <label for="lastname" class="form-label">Nom :</label>
      <input type="text" class="form-control" name="lastname" value="<?= $patient['lastname'] ?>">

      <label for="firstname" class="form-label">Prenom :</label>
      <input type="text" class="form-control" name="firstname" value="<?= $patient['firstname']?>">

      <label for="birthdate" class="form-label">Date de naissance :</label>
      <input type="date" class="form-control" name="birthdate" value="<?= $patient['birthdate'] ?>">

      <label for="phone" class="form-label">Telephone :</label>
      <input type="text" class="form-control" name="phone" value="<?= $patient['phone']?>">

      <label for="mail" class="form-label">email :</label>
      <input type="email" class="form-control" name="mail" value="<?= $patient['mail']?>">

      <div class="d-flex justify-content-center">
          <button class="btn btn-secondary py-1 px-4 my-4 ">Modifier</button>
      </div>
  </form>


<!-- affichage du profil du patient -->
<?php elseif(isset($_GET['action']) && $_GET['action'] == "profil"): ?>

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
                  <h5 class="card-title my-4">Rendez-vous N° <?= $value['id'] ?></h5>           
                  <h5 class="card-title my-4">Date : <?= $value['dateHour'] ?></h5>
                  <!-- <h5 class="card-title my-4">id : <?= $value['idPatients'] ?></h5>                    -->
                  <a href="index.php?controller=rendezvous&action=modify&id=<?= $value['id'] ?>" class="btn btn-outline-light mt-4 mb-2 p-2">Modifier le rendez-vous</a>           
              </div>
          </div>        
      <?php endforeach; ?>
    </div>
  </div>
    
<?php endif; ?>