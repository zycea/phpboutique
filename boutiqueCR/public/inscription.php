<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Inscription</title>
</head>
<body>
  <!-- header -->
  <?php include_once "header.php"; ?>
  <!-- formulaire d'inscription -->
  <div class="container register-form">
    <form method="post" action="traitement_client.php">
      <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Prenom</label>
        <input type="text" class="form-control" name="prenom" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="mdp" required>
      </div>
      <button type="submit" class="btn btn-primary" name="inscription">Inscription</button>
    </form>
  </div>
</body>
</html>