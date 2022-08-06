<?php 
session_start();
require_once "../classes/produit.php";
$produits = Produit::infoProduit($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Details</title>
</head>
<body>
  <?php include_once "header.php"; ?>
  <div class="container">
    <div class="details">
      <div class="left">
        <img src="../imgs/<?= $produits['url_image'] ?>" >
      </div>

      <div class="right">
        <h3><?= $produits['titre'] ?></h3>
        <p><?= $produits['description'] ?></p>
        <p><em>Prix : <?= $produits['prix'] ?> €</em></p>
        <?php if($produits['statut'] == "Solde"){ ?>
          <p>Ce produit est soldé pour une reduction de <?= $produits['reduction'] ?> %</p>
        <?php } ?>
      </div>
    </div>
    <div class="bouton">
      <form action="traitement_client.php" method="post">
        <input type="text" name="id-produit" value="<?= $produits['id_produit'] ?>" hidden>
        <input type="text" name="prix" value="<?= $produits['prix'] ?>" hidden>
        <?php if($produits['statut'] == "Solde") { ?>
          <input type="text" name="reduction" value="<?= $produits['reduction'] ?>" hidden>
        <?php } ?>
        <button class="btn btn-primary" name="acheter">Acheter ce produit</button>
      </form>
    </div>
  </div>
</body>
</html>