<h1 class="text-center my-5 text-primary">Formulaire d'ajout de patient et de rendez-vous</h1>


<form action="index.php?controller=patientRendezvous&action=add" method="POST" class="col-4 mx-auto form-patient-ajout mb-5">
    
    <div class="text-center mb-2"><?= $msg ?></div>

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

    <label for="dateHour" class="form-label">Date et Heure du rendez-vous :</label> 
    <input type="datetime-local" id="" class="form-control my-2" name="dateHour" min="2022-01-01T08:00" max="2050-01-30T18:30">      
    <?php foreach($id as $key => $value): ?>
        <input type="hidden" name="idPatients" value="<?= $value['id'] + 1 ?>">
    <?php endforeach; ?>

    <div class="d-flex justify-content-center">
        <button class="btn btn-secondary py-1 px-4 my-4 ">Ajouter</button>
    </div>

</form>
