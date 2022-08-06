<?php
class User{
  private static function dbConnect(){
    $dbConn;
    try{
      $dbConn = new PDO('mysql:host=localhost;dbname=id19290719_blog','id19290719_testphp','<pe@7OVuf}yto%MH');
    }catch(Exception $e){
      $dbConn = $e;
    }
    return $dbConn;
  }

  public static function inscription($nom, $prenom, $email, $password){
    // etablir la connexion avec la base de données
    $connexion = self::dbConnect();
    // hasher le mot de passe
    $password = password_hash($password,  PASSWORD_DEFAULT);
    // preparer la requette pour enregistrer un nouvel utilisateur
    $request = $connexion->prepare("INSERT INTO users (nom, prenom, email, password, type) VALUES (?,?,?,?,?)");
    // execution de la requette
    $request->execute(array($nom, $prenom, $email, $password, 'Client'));
  }

  public static function connexion($email, $password){  
    // etablir la connexion avec la base de donnees
    $connexion = self::dbConnect();
    // preparer la requette pou avoir les information de l'utilisateur via l'email
    $request = $connexion->prepare("SELECT * FROM users WHERE email = ?");
    // executer la requette
    $request->execute(array($email));
    // recuperer le resultat de la requette
    $user = $request->fetch();

    if(!empty($user)){ // si l'email existe
      // verifier si le mot de passe est a l'origine du hash dans la base de donnees
      if(password_verify($password, $user['password'])){ // si mdp correct
        // creer la session de l'utilisateur
        $_SESSION['connected_user'] = $user['id_user'];
        if($user['type'] == "Admin"){ // si l'utilisateur est un admin
          // redireiger vers la page accueil des admin qui se trouve dans le dossier admin
          $_SESSION['connected_user_type'] = $user['type'];
          header("Location: https://zyace.000webhostapp.com/boutiqueCR/index.php");
        }else{ // si c'est un client 
          // rediriger vers index qui se trouve a la racine du dossier boutique
          $_SESSION['connected_user_type'] = $user['type'];
          header("Location: https://zyace.000webhostapp.com/boutiqueCR/index.php");
        }
      }else{ // si mdp incorrect
        echo "mot de passe incorrect!";
      }
    }else{ // si l'email n'existe pas
      echo "cette adresse n'exste pas !";
    }
  }

  // methode qui permet de recuperer la liste des users
  public static function listeUser(){
    // etablir la connexion avec la base de donnees
    $connexion = self::dbConnect();
    // preparer la requette pour recuperer la liste des utilisateurs
    $request = $connexion->prepare("SELECT * FROM users");
    // ecrire le code qui permet de l'executer
    $request->execute();
    // retourner le resultat de la requette sous forme de tableau
    return $request->fetchAll();
  }
  public static function userInfos($idUser){
    $connexion = self::dbConnect();
    $request = $connexion->prepare("SELECT * FROM users WHERE id_user =?");
    $request->execute(array($idUser));
    return $request->fetch();
  }
  public static function updateUser($idUser , $nom, $prenom, $email, $password){
    $connexion = self::dbConnect();
    if($password = ""){
        $request = $connexion->prepare("UPDATE users SET nom = ? , prenom = ?, email =? WHERE id_user =?");
        try{
            $request->execute(array($nom,$prenom,$email,$idUser));

        }catch(Exception $e){
            echo $e->getMessage();
        }
    
  }else{
        $password = password_hash($password, PASSWORD_DEFAULT);
        $request = $connexion->prepare("UPDATE users SET nom = ? , prenom = ?, email =? ,password = ? WHERE id_user =?");
        try{
            $request->execute(array($nom,$prenom,$email,$password,$idUser));

        }catch(Exception $e){
            echo $e->getMessage();
           }

         }

    }
}

