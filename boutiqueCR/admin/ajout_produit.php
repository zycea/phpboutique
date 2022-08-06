<?php session_start(); 
require_once "../classes/categorie_classe.php";
$categories = Categorie::listeCategorie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Ajout produit</title>
</head>
<body>
  <?php include_once "../public/header.php"; ?>
  <div class="container product-form">
    <form class="row g-3" method="post" action="traitement_admin.php" enctype="multipart/form-data">
      <!-- titre -->
      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Titre</label>
        <input type="text" class="form-control" name="titre">
      </div>
      <!-- description -->
      <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
      </div>
      <!-- prix -->
      <div class="col-md-6">
        <label for="inputAddress" class="form-label">Prix</label>
        <input type="number" class="form-control" name="prix">
      </div>
      <!-- categorie -->
      <div class="col-md-6">
        <label for="inputAddress2" class="form-label">Categorie</label>
        <select class="form-select" name="categorie">
          <?php foreach($categories as $cat){?>
            <option value="<?= $cat['id_categorie']; ?>"><?= $cat['nom_categorie'] ?></option>
          <?php } ?>
        </select>
      </div>
      <!-- taille -->
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Taille</label>
        <select class="form-select" name="taille">
          <option value="S">S</option>
          <option value="M">M</option>
          <option value="L">L</option>
          <option value="XL">XL</option>
        </select>
      </div>
      <!-- statut -->
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Statut</label>
        <select class="form-select" name="statut">
          <option value="New">New</option>
          <option value="Solde">Solde</option>
        </select>
      </div>
      <!-- image -->
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Reduction</label>
        <input type="number" class="form-control" name="reduction">
      </div>
      <!-- bouton valider -->
      <div class="col-12">
        <button name="Ajouter" class="btn btn-primary">Ajouter</button>
      </div>
    </form>
  </div>
</body>
</html>