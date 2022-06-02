<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OOTD</title>
    <link rel="stylesheet" href="style2.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;900&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="icon" href="img/fav-ico.png">
  </head>

  <body>
  <header class="header">
        <h1 class="logo"><a href="accueil.php">OOTD</a></h1>
      <ul class="main-nav">
          <li><a href="boutique.php">Boutique</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="apropos.html">A propos</a></li>
      </ul>
    </header>
<!-- Slider -->
    <div class="js-slider">
      <div class="js-photos" id="decaleGauche">
        <div class="js-photo1">
          <h1 class="txtslide">Outfit of the day</h1>
        </div>
        <div class="js-photo2">
        <h1 class="txtslide">Outfit of the day</h1>
        </div>
        <div class="js-photo3">
        <h1 class="txtslide">Outfit of the day</h1>
        </div>
      </div>
      <div class="nav-slider">
        <button class="btn-slider-d">
          <svg viewBox="0 0 24 24">
            <path
              d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"
            />
          </svg>
        </button>
        <button class="btn-slider-g">
          <svg viewBox="0 0 24 24">
            <path d="M5 3l3.057-3 11.943 12-11.943 12-3.057-3 9-9z" />
          </svg>
        </button>
      </div>
    </div>
<!-- Fake pub -->
<div class="promo">
  <div class="promotxt">
    <p><strong>PROMOTION</strong> DE RENTRÉE JUSQU'À <strong>- 50%</strong> SUR UNE SÉLECTION D'ARTICLES</p>
  </div>
</div>
<!-- Information -->
    <div class="container">
      <div>
        <img
          src="img/remarque.png"
          alt=""
          class="img-info"
          width="200"
          height="200"
        />
        <p>Choisissez parmi nos oufits et faites votre choix!</p>
      </div>
      <div>
        <img
          src="img/paiement-securise.png"
          alt=""
          class="img-info"
          width="200"
          height="200"
        />
        <p>Paiement 100% sécurisé et cripter par nos soins.</p>
      </div>
      <div>
        <img
          src="img/boite-dexpedition.png"
          alt=""
          class="img-info"
          width="200"
          height="200"
        />
        <p>Réservé votre commande dans les 72h qui vienne.<br />Commande rapide aux quatre coins de la France.
        </p>
      </div>
    </div>
<!-- Nouveautés -->
  <div>
    <h1 class="titresimple">Nouveautés</h1>
  </div>

<section>
    <?php
            INCLUDE ("connexion.php");
            //affiche les 3 derniers produit 
            $requete="SELECT * FROM produit, categorie WHERE nom_categorie=ext_categorie ORDER BY id_produit DESC LIMIT 3 ";

            $stmt=$db->query($requete);
            $resultat=$stmt->fetchall(PDO::FETCH_ASSOC);

            foreach($resultat as $produit){
                echo "<div class='demo-boutique'><a href='produit_detaille.php?produit_id={$produit["id_produit"]}'><img src='{$produit["image_produit"]}' alt='' class='img_produit'><h1>{$produit["nom_produit"]}</h1></a><h2>{$produit["nom_categorie"]}</h2><h3>{$produit["prix_produit"]} €</h3><h3>Taille: {$produit["taille_produit"]}</h3></div> \n";
            }
?>            
</section>

<!-- Catégories -->
<div><br><h1 class="titresimple">Catégories</h1><br></div>


<section>
    <div class="demo-boutique2">
      <div class="art-boutique21"><a class="btnbt" href="boutique.php?categorie=1">Homme</a></div>
      <div class="art-boutique23"><a class="btnbt" href="boutique.php?categorie=2">Femme</a></div>
      <div class="art-boutique22"><a class="btnbt" href="boutique.php?categorie=3">Mixte</a></div>
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
    <script src="slider.js"></script>
  </body>
</html>
