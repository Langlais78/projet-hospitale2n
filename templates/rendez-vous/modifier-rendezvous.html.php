<h1 class="text-center my-5 text-primary">Modifier le rendez-vous</h1>

<!-- <div class="text-center my-3"><?= $msg ?></div> -->

<div class="d-flex justify-content-center">
    <form action="rendezvousModify.php?id=<?= $rendezvous['id'] ?>" method="post" class="col-4 form-patient-rendezvous">
        <label for="dateHour" class="form-label">Date et Heure du rendez-vous :</label>
        <input type="datetime-local" id="" class="form-control my-2" name="dateHour" value="<?= $rendezvous['dateHour'] ?>" min="2022-01-01T08:00" max="2050-01-30T18:30" >
        <label for="idPatients" class="form-label">Prenom et Nom du patient :</label>
        <select id="" class="form-control my-2" name="idPatients" value="">
            <option value=""></option>
                <?php foreach($patient as $key => $value): ?>
                    <option value="<?= $value['id'] ?>">- <?= ucfirst($value['firstname']) ?> <?= strtoupper($value['lastname']) ?> -</option>
                <?php endforeach; ?>
        </select>

        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary p-2 fs-5 mt-4">MODIFIER LE RENDEZ-VOUS</button>
        </div>
        
    </form>
</div>

