<!-- Affichage de la page d'acceuil -->

<img src="libraries/img/banniere.jpg" alt="image de medecin" class="col-12 img-fluid">

<div class="col-8 mx-auto mt-5 mb-4">
    <h3 class="text-center fs-1">Bienvenue dans l'application Hopitale2n</h3>
</div>

<div class="col-8 mx-auto">
    <p class="fs-4 text-center">Avec l'application <span class="text-uppercase">Hopitale2n</span> rien de plus facile pour gérer vos patients et vos rendez-vous. Avec un simple clic accéder a la liste de vos patients ou rendez-vous, gérer l'ajout d'un patient ou sa modification, l'ajout d'un rendez-vous ou sa modification.</p>
</div>

<div class="col-10 d-flex justify-content-around flex-wrap mx-auto p-5 mb-5 block-index">
    <a href="index.php?controller=patient&action=add" class="bouton-accueil text-center">Ajouter patient</a>
    <a href="index.php?controller=patient&action=findAll" class="bouton-accueil text-center">liste patient</a>
    <a href="index.php?controller=rendezvous&action=findAll" class="bouton-accueil text-center">liste des rendez-vous</a>
    <a href="index.php?controller=rendezvous&action=add" class="bouton-accueil text-center">Ajouter un rendez-vous</a>
    <a href="index.php?controller=patientRendezvous&action=add" class="bouton-accueil text-center">Ajouter un patient et un rendez-vous</a>
</div> 