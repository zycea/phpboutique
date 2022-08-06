<?php
class Commande{
  // methode qui permet d'eatblir la connexion avec la base de donnees
  private static function dbConnect(){
    $dbConn;
    try{
      $dbConn = new PDO('mysql:host=localhost;dbname=id19290719_blog','id19290719_testphp','<pe@7OVuf}yto%MH');
    }catch(Exception $e){
      $dbConn = $e;
    }
    return $dbConn;
  }

  // methode pour enregistrer une nouvelle commande
  public static function validerCommande($idC, $idP, $prix, $date){
    $connexion = self::dbConnect();
    // preparer la requette
    $request = $connexion->prepare("INSERT INTO commandes (produit, client, prix_total, date_achat) VALUES (?,?,?,?)");
    // executer la requette
    try{
      $request->execute(array($idP, $idC, $prix, $date));
    }catch(Exception $e){
      $e->getMessage();
    }
    header("Location: https://zyace.000webhostapp.com/boutiqueCR/public/achat.php");
  }

  // methode pour recuperer les commandes d'un utilisateur
  public static function commandeClient($idClient){
    // etablir la connexion avec la base de donnees
    $connexion = self::dbConnect();
    // preparer la requette
    $request = $connexion->prepare("SELECT commandes.id_commande, commandes.client, commandes.produit, commandes.prix_total, commandes.date_achat, produits.titre, produits.id_produit FROM commandes, produits WHERE commandes.produit = produits.id_produit AND commandes.client = ?");
    // executer la requette
    try{
      $request->execute(array($idClient));
    }catch(Exception $e){
      echo $e->getMessage();
    }
    // retourner le resultat de la requette
    return $request->fetchAll();
  }
}