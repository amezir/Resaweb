<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OOTD</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;900&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="icon" href="img/fav-ico.png">
  </head>
<!-- Navigation -->
  <body>
  <header class="header">
        <h1 class="logo"><a href="accueil.php">OOTD</a></h1>
      <ul class="main-nav">
          <li><a href="boutique.php">Boutique</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="apropos.html">A propos</a></li>
      </ul>
    </header>


 <!-- Filtres -->   
    <section class="card-container">
  <a href="boutique.php?categorie=1">Homme</a>
  <a href="boutique.php?categorie=2">Femme</a>
  <a href="boutique.php?categorie=3">Mixte</a>
  <!-- Listes Produits -->
<div class="card">
  <?php
  //filtre qui affiche les produits
INCLUDE ("connexion.php");
if (isset($_GET["categorie"])){
$requete="SELECT * FROM produit,categorie WHERE nom_categorie=ext_categorie AND id_categorie={$_GET["categorie"]}";
$requete = $requete . " ORDER BY " . $_GET["categorie"];
$stmt = $db->query($requete);
$resultat=$stmt->fetchall(PDO::FETCH_ASSOC);
foreach($resultat as $produit){
  echo "<div ><a href='produit_detaille.php?produit_id={$produit["id_produit"]}'><img src='{$produit["image_produit"]}' alt='' class='img_produit'><h1>{$produit["nom_produit"]}</h1></a><h2>{$produit["nom_categorie"]}</h2><h3>{$produit["prix_produit"]} €</h3><h3>Taille: {$produit["taille_produit"]}</h3></div> \n";
}
}
?>
</div>
</section>

<!-- footer -->
<footer>
      <div>
        <h1 class="logofooter"><a href="accueil.php">OOTD</a></h1>
      </div>
      <div>
        <h2>Contact</h2>
        <a href="contact.php">Nous contacter</a>
      </div>
      <div>
        <h2>Autres</h2>
        <a href="mentionlegal.html">Mentions Légales</a>
      </div>

    </footer>
  </body>
</html>