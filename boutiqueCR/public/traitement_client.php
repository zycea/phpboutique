<?php
session_start();
require_once "../classes/user.php"; // inclure le fichier user.php qui se trouve dans le dossier classes
require_once "../classes/commande.php";
if(isset($_POST['inscription'])){
  // declarer les variable nom, prenom, email, password
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $password = $_POST['mdp'];

  User::inscription($nom, $prenom, $email, $password);
}


// connexion
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['mdp'];

  User::connexion($email, $password);
}

// pour enregister une commande
if(isset($_POST['acheter'])){
  if(isset($_SESSION['connected_user']) && $_SESSION['connected_user_type'] == "Client"){
    $idClient = $_SESSION['connected_user'];
    $idProduit = $_POST['id-produit'];
    $prix = $_POST['prix'];
    if(isset($_POST['reduction'])){
      $reduction = $_POST['reduction'];
      $prix = $prix - ($prix * $reduction) / 100;
    }

    $prixTotal = $prix + 0.2 * $prix;
    $date = date('Y-m-d');

    // appel de la methode pour enregistrer la commande dans la base de donnees
    Commande::validerCommande($idClient,$idProduit, $prixTotal, $date);

  }else{
    echo "veuillez vous connecter en tant que client";
  }
}

if(isset($_POST['update'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['mdp'];
    User::updateUser($_SESSION['connected_user'], $nom, $prenom ,$email,$password);
}