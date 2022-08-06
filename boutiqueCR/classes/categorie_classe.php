<?php
class Categorie{
  private static function dbConnect(){
    $dbConn;
    try{
      $dbConn = new PDO('mysql:host=localhost;dbname=id19290719_blog','id19290719_testphp','<pe@7OVuf}yto%MH');
    }catch(Exception $e){
      $dbConn = $e;
    }
    return $dbConn;
  }

  public static function listeCategorie(){
    // etablir la connexion avec la base de donnees
    $connexion = self::dbConnect();
    // preparer la requette pour rcuperer toutes les categories
    $request = $connexion->prepare("SELECT id_categorie, nom_categorie FROM categories");
    // executer la requette
    $request->execute();
    // recuperer le resultat de la requette dans un tableau
    $categories = $request->fetchAll();
    return $categories;
  }
}