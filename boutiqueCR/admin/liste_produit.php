<?php 
session_start();
require_once "../classes/produit.php";
$produits = Produit::listeProduit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Liste produit</title>
</head>
<body>
  <?php include_once "../public/header.php"; ?>

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titre</th>
          <th>Prix</th>
          <th>Statut</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
      <?php foreach ($produits as $p) { ?>
          <tr>
            <td><?= $p['id_produit']; ?></td>
            <td><?= $p['titre']; ?></td>
            <td><?= $p['prix']; ?></td>
            <td><?= $p['statut']; ?></td>
            <td class="action">
              <a class="btn btn-danger" href="traitement_admin.php?id=<?= $p['id_produit'] ?>&img=<?= $p['url_image'] ?>">Supprimer</a>
              <a class="btn btn-warning" href="modifier_produit.php?id=<?= $p['id_produit'] ?>">Modifier</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>