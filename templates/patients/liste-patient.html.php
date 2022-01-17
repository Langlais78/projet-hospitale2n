<h1 class="text-center my-5">LISTE DES PATIENTS</h1>

<div class="text-center">
  <a href="patientAjout.php" class="col-6 btn btn-outline-success my-3 py-2">Ajouter un patient</a>
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
              <a href="patientProfil.php?id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table">Details patient</a>
              <a href="patientModify.php?id=<?= $tab['id'] ?>" class="mx-2 lien-patient-table">Modifier</a>
            </td>
      </tr>


    <?php endforeach; ?>

  </tbody>
</table>
</div>

    

