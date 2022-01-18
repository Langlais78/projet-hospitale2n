<div id="">
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
</div>