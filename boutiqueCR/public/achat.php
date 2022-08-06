<?php 
session_start(); 
require_once "../classes/commande.php";
$commandes = Commande::commandeClient($_SESSION['connected_user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Achat</title>
</head>
<body>
  <?php include_once "header.php"; ?>
  <div class="container">
    <div class="profil">
      <p><a href="modifier_compte.php?id<?= $_SESSION['connected_user'] ?>">Modifier mon compte</a></p>
    </div>
      <div class="historique">
      <table class="table">
        <thead>
          <tr>
            <th>Identifiant commande</th>
            <th>Produit</th>
            <th>Prix Total</th>
            <th>Date Achat</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($commandes as $c) { ?>
            <tr>
              <td><?= $c['id_commande'] ?></td>
              <td><?= $c['titre'] ?></td>
              <td><?= $c['prix_total'] ?></td>
              <td><?= $c['date_achat'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>