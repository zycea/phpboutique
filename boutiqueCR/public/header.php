<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid navigation">
    <?php if(isset($_SESSION['connected_user_type']) && $_SESSION['connected_user_type'] == "Admin") { ?>
      <div class="collapse navbar-collapse left-naviagation">
        <a class="nav-link active" aria-current="page" href="https://zyace.000webhostapp.com/boutiqueCR/admin/ajout_produit.php">Ajout produit</a>
        <a class="nav-link active" aria-current="page" href="https://zyace.000webhostapp.com/boutiqueCR/admin/liste_produit.php">Liste Produit</a>
        <a class="nav-link active" aria-current="page" href="https://zyace.000webhostapp.com/boutiqueCR/admin/liste_client.php">Liste client</a>
      </div>
    <?php }else{ ?>
      <div class="collapse navbar-collapse left-navigation">
        <a class="navbar-brand" href="https://zyace.000webhostapp.com/boutiqueCR/index.php">Accueil</a>
        <a class="nav-link active" aria-current="page" href="https://zyace.000webhostapp.com/boutiqueCR/public/solde.php">Solde</a>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/boutiqueCR/classes/categorie_classe.php');

        $categories = Categorie::listeCategorie();
        foreach ($categories as $c){ ?>
          <a class="nav-link active" aria-current="page" href="https://zyace.000webhostapp.com/boutiqueCR/public/categorie.php?id=<?= $c['id_categorie'] ?>"><?= $c['nom_categorie'] ?></a>
        <?php } ?>
      </div>
    <?php } ?>
  
    <div class="collapse navbar-collapse right-navigation">
      <ul class="navbar-nav">
        <!-- si l'utilisateur n'est pas authentifie -->
        <?php if(!isset($_SESSION['connected_user'])){ ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="https://zyace.000webhostapp.com/boutiqueCR/public/connexion.php">Sign In </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://zyace.000webhostapp.com/boutiqueCR/public/inscription.php">Sign up</a>
          </li>
        <?php } else { ?>
          <!-- si l'utilisateur est authentifie -->
          <div class="deconnexion">
            <li class="nav-item">
            <?php if($_SESSION['connected_user_type'] != "Admin") { ?>
              <a class="dropdown-item" href="https://zyace.000webhostapp.com/boutiqueCR/public/achat.php">Mes achats</a>
            <?php } ?>
            </li>
            <li class="nav-item">
              <form action="" method="post">
                <button class="btn btn-danger" name="logout">Logout</button>
              </form>
            </li>
          </div>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<?php 
if(isset($_POST['logout'])){
  session_destroy();
 echo '<script>window.location.href = "https://boutique-diokel.000webhostapp.com/boutique/index.php";</script>';
}
?>