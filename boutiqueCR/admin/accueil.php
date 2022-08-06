<?php 
session_start();
// include_once '../public/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Accueil Admin</title>
</head>
<body>
<?php include_once "../public/header.php"; ?>
  <div class="container overflow-hidden text-center">
    <div class="row gy-5">
      <div class="col-6">
        <div class="p-3 border bg-light">
          <a href="ajout_produit.php">Ajouter un Produit</a>
        </div>
      </div>
      <div class="col-6">
        <div class="p-3 border bg-light">
          <a href="liste_produit.php">Liste des produits</a>
        </div>
      </div>
      <div class="col-6">
        <div class="p-3 border bg-light">
          <a href="#">Liste des clients</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>