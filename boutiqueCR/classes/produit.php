<?php
class Produit{
  private static function dbConnect(){
    $dbConn;
    try{
      $dbConn = new PDO('mysql:host=localhost;dbname=id19290719_blog','id19290719_testphp','<pe@7OVuf}yto%MH');
    }catch(Exception $e){
      $dbConn = $e;
    }
    return $dbConn;
  }

  // methode pour enreegistrer un nouveau produit dans la table produits
  public static function ajoutProduit($titre, $description, $prix, $taille, $categorie, $reduction, $image, $statut){
    // etablir la connexion avec la base de donnees
    $connexion = self::dbConnect();
    if($statut == "New"){
      // preparer la requette pour enregistrer un produit sans solde
      $request = $connexion->prepare("INSERT INTO `produits`(`titre`, `description`, `prix`, `url_image`, `categorie`, `taille`, `statut`) VALUES (?,?,?,?,?,?,?)");
      // executer la requette
      try{
        $request->execute(array($titre, $description, $prix, $image, $categorie, $taille, $statut));
      }catch(Exception $e){
        echo $e->getMessage();
      }
    }else{
      // verifier si il a mit une reduction
      if($reduction == ""){
        echo "Produit en solde veullez mettre une reduction svp merci !";
      }else{
        // preparer la requette pour enregistrer un produit en solde
        $request = $connexion->prepare("INSERT INTO `produits`(`titre`, `description`, `prix`, `url_image`, `categorie`, `taille`, `statut`, `reduction`) VALUES (?,?,?,?,?,?,?,?)");
        // executer la requette
        try{
          $request->execute(array($titre, $description, $prix, $image, $categorie, $taille, $statut, $reduction));
        }catch(Exception $e){
          echo $e->getMessage();
        }
      }
    }
    // rediriger vers ajout_produit.php 
    header("Location: https://zyace.000webhostapp.com/boutiqueCR/admin/ajout_produit.php");
  }

  // methode pour recuperer la liste des produits
  public static function listeProduit(){
    // etablir la connexion avec la base de donnees
    $connexion = self::dbConnect();
    // preparer la requette
    $request = $connexion->prepare("SELECT id_produit, titre, prix, statut, url_image FROM produits WHERE id_produit NOT IN (SELECT produit FROM commandes)");
    // executer la requette
    try{
      $request->execute();
    }catch(Exception $e){
      echo $e->getMessage();
    }
    // recuperer le resultat de la requette dans un tableau
    return $request->fetchAll();
  }

  // methode pour supprimer un produit selectionne
  public static function suprimerProduit($idProduit){
    // etablir la connexion avec la base de donnees
    $connexion = self::dbConnect();
    // preparation de la requette 
    $request = $connexion->prepare("DELETE FROM produits WHERE id_produit = ?");
    // executer la requette
    try{
      $request->execute(array($idProduit));
    }catch(Exception $e){
      echo $e->getMessage();
    }
    // rediriger vers liste_produit.php apres supression
    header("Location: https://zyace.000webhostapp.com/boutiqueCR/admin/liste_produit.php");
  }

  // methode pour recuperer les informations d'un produit selectionne
  public static function infoProduit($idProduit){
    // etablir la connexion avec la base de donnees
    $connexion = self::dbConnect();
    // preparer la requette
    $request = $connexion->prepare("SELECT * FROM produits WHERE id_produit = ?");
    // executer la requette
    try{
      $request->execute(array($idProduit));
    }catch(Exception $e){
      echo $e->getMessage();
    }
    // recuperer le resultat de larequette dans un tableau et le retourner
    return $request->fetch();
  }

  // methode pour modifier un produit
  public static function modifierProduit($idProduit, $titre, $description, $prix, $categorie, $taille, $statut, $reduction, $imgName){
    // etablir la connexion avec la base donnees
    $connexion = self::dbConnect();
    if($statut == "New"){
      // preparer la requette
      $request = $connexion->prepare("UPDATE `produits` SET `titre`=?,`description`=?,`prix`=?,`url_image`=?,`categorie`=?,`taille`=?,`statut`=?,`reduction`=? WHERE id_produit = ?");
      // executer la requette
      try{
        $request->execute(array($titre, $description, $prix, $imgName, $categorie, $taille, $statut, NULL, $idProduit));
      }catch(Exception $e){
        echo $e->getMessage();
      }
    }else{
      if($reduction == ""){
        echo "le produit est en solde veuillez appliquer une reduction svp !";
      }else{
        // preparation de la requette
        $request = $connexion->prepare("UPDATE `produits` SET `titre`=?,`description`=?,`prix`=?,`url_image`=?,`categorie`=?,`taille`=?,`statut`=?,`reduction`=? WHERE id_produit = ?");
        // executer la requette
        try{
          $request->execute(array($titre, $description, $prix, $imgName, $categorie, $taille, $statut, $reduction, $idProduit));
        }catch(Ecxeption $e){
          echo $e->getMessage();
        }
      }
    }
    // rediriger vers liste_produit.php apres modification
    header("Location: https://zyace.000webhostapp.com/boutiqueCR/admin/liste_produit.php");
  }

  // methode pour recuperer tout les produit d'une categorie specifie
  public static function getProductFromCategorie($idCategorie){
    // ecrir le code permettant d'etablir la connexion avec la base donnees
    $connexion = self::dbConnect();
    // preparer la requette pour recuperer tous les produits de la categorie specifiee
    $request = $connexion->prepare("SELECT id_produit, titre, prix, statut, url_image, categorie FROM produits WHERE categorie = ? AND id_produit NOT IN (SELECT produit FROM commandes)");
    // ecire le code permettant d'executer la requette
    $request->execute(array($idCategorie));
    // retourner le resultat de la requette sous forme de tableau
    return $request->fetchAll();
  }

  // methode pour recuperer les produits en soldes
  public static function solde(){
    // ecrir le code permettant d'etablir la connexion avec la base donnees 
    $connexion = self::dbConnect();
    // preparer la requette pour recuperer tous les produits de la categorie specifiee
    $request = $connexion->prepare("SELECT id_produit, titre, prix, statut, url_image, categorie FROM produits WHERE statut = 'Solde' AND id_produit NOT IN (SELECT produit FROM commandes)");
    // ecire le code permettant d'executer la requette
    $request->execute();
    // retourner le resultat de la requette sous forme de tableau
    return $request->fetchAll();
  }
}