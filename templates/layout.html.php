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
    <link rel="stylesheet" href="libraries/css/style.css">

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

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
          <li class="nav-item">
            <a class="nav-link fs-5" aria-current="page" href="index.php">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Patient
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item fs-5" href="index.php?controller=patient&action=findAll">Liste Patient</a></li>
              <li><a class="dropdown-item fs-5" href="index.php?controller=patient&action=add">Ajouter Patient</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Rendez-vous
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item fs-5" href="index.php?controller=rendezvous&action=findAll">liste rendez-vous</a></li>
              <li><a class="dropdown-item fs-5" href="index.php?controller=rendezvous&action=add">Ajout rendez-vous</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" aria-current="page" href="index.php?controller=patientRendezvous&action=add">Ajouter Patient + Rendez-vous</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
    <?= $pageContent ?>

</body>

</html>