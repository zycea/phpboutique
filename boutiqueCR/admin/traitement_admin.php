<?php
session_start();
require_once "../classes/produit.php";
// pour ajouter un nouveau produit
if(isset($_POST['Ajouter'])){
  // recuperation de la saisie de l'utilisateur
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  $prix = $_POST['prix'];
  $categorie = $_POST['categorie'];
  $taille = $_POST['taille'];
  $statut = $_POST['statut'];
  $reduction = $_POST['reduction'];
  // traitement de l'image
  $imgName = $_FILES['image']['name'];
  $tmpName = $_FILES['image']['tmp_name'];
  $fileDestination = $_SERVER['DOCUMENT_ROOT']."/boutiqueCR/imgs/".$imgName;
  if(move_uploaded_file($tmpName, $fileDestination)){
    Produit::ajoutProduit($titre, $description, $prix, $taille, $categorie, $reduction, $imgName, $statut);
  }
}
// si le parametre id est defini 
if(isset($_GET['id'])){
  // supprimer l'image associee au produit
  if(unlink($_SERVER['DOCUMENT_ROOT']."/boutiqueCR/imgs/".$_GET['img'])){
    // appel de la methode suprimerProduit en lui passant le parametre id qu'on obtient via la super globale $_GET
    Produit::suprimerProduit($_GET['id']);
  }
}

// pour modifier un produit
if(isset($_POST['modifier'])){
  $idProduit = $_POST['id'];
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  $prix = $_POST['prix'];
  $categorie = $_POST['categorie'];
  $taille = $_POST['taille'];
  $statut = $_POST['statut'];
  $oldImage = $_POST['old-image'];
  $reduction = $_POST['reduction'];

  $imgName = $_FILES['image']['name'];
  $tmpName = $_FILES['image']['tmp_name'];
  $fileDestination = $_SERVER['DOCUMENT_ROOT']."/boutiqueCR/imgs/".$imgName;
  $files = scandir($_SERVER['DOCUMENT_ROOT']."/boutiqueCR/imgs/");
  if(in_array($oldImage, $files)){
    if(unlink($_SERVER['DOCUMENT_ROOT']."/boutiqueCR/imgs/". $oldImage)){
      if(move_uploaded_file($tmpName, $fileDestination)){
        //appel de la methode pour modifier le produit
        Produit::modifierProduit($idProduit, $titre, $description, $prix, $categorie, $taille, $statut, $reduction, $imgName); 
      }
    }
 }else{
    if(move_uploaded_file($tmpName, $fileDestination)){
      //appel de la methode pour modifier le produit
      Produit::modifierProduit($idProduit, $titre, $description, $prix, $categorie, $taille, $statut, $reduction, $imgName); 
    }
 }
}