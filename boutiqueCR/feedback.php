<?php
// connexion a la base de donnees
$connexion = $connexion = new PDO('mysql:host=localhost;dbname=id19290719_blog','id19290719_testphp','<pe@7OVuf}yto%MH');

// requette pour recuperer le nombre de pouce rouge
$request = $connexion->prepare("SELECT COUNT(*) AS nbr FROM feedback WHERE choix = ?");
// executer la requette
$request->execute(array('pouce rouge'));
// recuperer le nombre de pouce rouges
$nbrPouceRouge = $request->fetch();

// requette pour recuperer le nombre de pouce rouge
$request = $connexion->prepare("SELECT COUNT(*) AS nbr FROM feedback WHERE choix = ?");
// executer la requette
$request->execute(array('pouce vert'));
// recuperer le nombre de pouce rouges
$nbrPouceVert = $request->fetch();
if(isset($_POST['pr'])){
  // ecrire le code qui permet d'nregistrer la valeur 'pouce rouge' dans le champ choix de la table feedback
  // preparer la requette
  $request = $connexion->prepare("INSERT INTO feedback (choix) VALUE (?)");
  // executer la requette
  $request->execute(array('pouce rouge'));
}

if(isset($_POST['pv'])){
  // ecrire le code qui permet d'nregistrer la valeur 'pouce vert' dans le champ choix de la table feedback
  // preparer la requette
  $request = $connexion->prepare("INSERT INTO feedback (choix) VALUE (?)");
  // executer la requette
  $request->execute(array('pouce vert'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <form method="post">
      <button class="btn btn-danger" name="pr">Pouce Rouge</button>

      <button class="btn btn-success" name="pv">Pouce Vert</button>
    </form>
    <table class="table">
      <thead>
        <tr>
          <th>Nombre pouce rouge</th>
          <th>Nombre pouce vert</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $nbrPouceRouge['nbr']?></td>
          <td><?= $nbrPouceVert['nbr']?></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>```
