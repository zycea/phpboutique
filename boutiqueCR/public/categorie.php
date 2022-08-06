<?php 
session_start(); 
require_once "../classes/produit.php";
$produits = Produit::getProductFromCategorie($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Categorie</title>
</head>
<body>
  <?php include_once "header.php"; ?>
  <div class="container main">
    <?php foreach($produits as $p) { ?>
      <div class="produit">
        <img src="../imgs/<?= $p['url_image'] ?>">
        <h3><?= $p['titre'] ?></h3>
        <em>Prix : <?= $p['prix'] ?></em>
        <p>
          <a href="detail_produit.php?id=<?= $p['id_produit'] ?>">Voir details</a>
        </p>
      </div>
    <?php } ?>
  </div>
</body>
</html>