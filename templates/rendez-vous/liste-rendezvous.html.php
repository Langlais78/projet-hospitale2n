<h1 class="text-center my-5">LISTE DES PATIENTS</h1>

<div class="text-center">
  <a href="rendezvousAjout.php" class="col-6 btn btn-outline-primary my-3 py-2">Ajouter un rendez-vous</a>
</div>

<div class="table-responsive col-8 mx-auto">
<table id="table-liste-patient" class="table table-bordered table-hover text-center">
  <thead>
      <tr class="table table-info">
        
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
                <a href="rendezvous.php?id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table">Details rdv</a>
                <a href="patientModify.php?id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table">Modifier rdv</a>
              </td>
        </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>

    

