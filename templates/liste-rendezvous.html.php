

<h2 class="text-center my-5 text-primary">LISTE DES RENDEZ-VOUS</h2>

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

    

