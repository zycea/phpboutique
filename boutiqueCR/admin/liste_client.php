<?php
session_start();
require_once "../classes/user.php";
$users  = User::listeUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Liste clients</title>
</head>
<body>
  <?php include_once "../public/header.php"; ?>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>Identifiant</th>
          <th>Nom</th>
          <th>Premon</th>
          <th>Email</th>
          <th>Type</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($users as $u){ ?>
          <tr>
            <td><?= $u['id_user'] ?></td>
            <td><?= $u['nom'] ?></td>
            <td><?= $u['prenom'] ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['type'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>