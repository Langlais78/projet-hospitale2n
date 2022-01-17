<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- CDD Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> 

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" language="javascript" src="libraries/js/dataTable.js"></script>


    <!-- feuille de style CSS-->
    <link rel="stylesheet" href="css/style.css">

     <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Hospitale2n - <?= $pageTitle ?></title>
</head>

<body>


<nav class="navbar navbar-light bg-black entete">
  <div class="container-fluid">
      <h3><a href="index.php" class="text-white logo">Hospitale2n</a></h3>
  </div>
</nav>

<nav class="navbar navbar-light bg-light navbar-menu">
  <div class="container-fluid d-flex justify-content-center">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <a class="navbar-brand" href="patientAjout.php">Ajout patient</a>
        <a class="navbar-brand" href="patient.php">Patients</a>
        <a class="navbar-brand" href="rendezvousAjout.php">Ajout rendez-vous</a>
        <a class="navbar-brand" href="rendezvousListe.php">liste rendez-vous</a>
  </div>
</nav>

    <?= $pageContent ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>