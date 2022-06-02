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

  <!-- Navigation -->
  <header class="header">
        <h1 class="logo"><a href="accueil.php">OOTD</a></h1>
      <ul class="main-nav">
          <li><a href="boutique.php">Boutique</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="apropos.html">A propos</a></li>
      </ul>
    </header>

 <!-- Produit, Formulaire et envoie du mail -->   
<?php
INCLUDE ("connexion.php");
//affiche le produit en détail 
$requete="SELECT * FROM produit,categorie WHERE nom_categorie=ext_categorie AND id_produit={$_GET['produit_id']}";
$stmt=$db->query($requete);
$produit=$stmt->fetch(PDO::FETCH_ASSOC);
echo "<div class='produitct'>
  <img src='{$produit["image_produit"]}' alt='' class='produit_image'>
  <h1 class='titreproduit'>{$produit["nom_produit"]}</h1>
  <h2>{$produit["nom_categorie"]}</h2>
  <h2>{$produit["prix_produit"]}€</h2>
  <h2>{$produit["description_produit"]}</h2>
</div>";
//affiche du formulaire de réservation 
echo "<form action='' method='post'>
  <div class='divform'>
  <h3>Produit</h3>
    <input type='text' name='reservnomproduit' value='{$produit["nom_produit"]}' readonly  required>
  <h3>Taille</h3>
<select class='selectform' name='taille'>
    <option value='XS'>XS</option>
    <option value='S'>S</option>
    <option value='L'>L</option>
    <option value='M'>M</option>
    <option value='XL'>XL</option>
</select>
    <h3>Mail*</h3>
      <input type='email' name='reservmail' required>
    <h3>Nom*</h3>
      <input type='text' name='reservnom' required>
    <h3>Prénom*</h3>
      <input type='text' name='reservprenom' required> 
    <h3>Téléphone*</h3>
      <input type='tel' name='reservtel' maxlength='10' pattern='^[0-9]{10}$' required>
      </div>
      <div class='divform'>
    <h3>Adresse*</h3>
      <input type='text' name='reservadresse' required>
    <h3>Code Postal*</h3>
      <input type='text' name='reservcp' maxlength='5' required>
    <h3>Ville*</h3>
      <input type='text' name='reservville' required>
    <h3>Réserve du*</h3>
      <input type='date' name='reservdatedebut' min='2022-01-01' max='2022-12-31' required>
    <h3>Jusqu'au*</h3>
      <input type='date' name='reservdatefin' min='2022-01-01' max='2022-12-31' required>
      <br>
      <br>
      <br>
      <br>       
      <input type='submit' name='submit' value='Envoyer'>
      </div>
</form>";
//code pour envoyer les données du formulaire dans la base de données
if(isset($_POST['submit'])){
$produit_reservation=$_POST['reservnomproduit'];
$nom_reservation=$_POST['reservnom'];
$prenom_reservation=$_POST['reservprenom'];
$mail_reservation=$_POST['reservmail'];
$telephone_reservation=$_POST['reservtel'];
$adresse_reservation=$_POST['reservadresse'];
$cp_reservation=$_POST['reservcp'];
$ville_reservation=$_POST['reservville'];
$taille_reservation=$_POST['taille'];
$datedebut=$_POST['reservdatedebut'];
$datefin=$_POST['reservdatefin'];

$requete="INSERT INTO `reservation`(`produit_reservation`,`nom_reservation`, `prenom_reservation`, `mail_reservation`, `telephone_reservation`, `adresse_reservation`, `cp_reservation`, `ville_reservation`, `taille_reservation`, `date_debut`, `date_fin`) VALUES ('$produit_reservation','$nom_reservation','$prenom_reservation','$mail_reservation','$telephone_reservation','$adresse_reservation','$cp_reservation','$ville_reservation','$taille_reservation','$datedebut','$datefin')";
$db->query($requete);
echo "<h1 class='msgreserv'>Réservation validé</h1>";
//envoie du mail de confirmation de réservation
  $contenu="<h1>Merci d'avoir réservé sur ootd!</h1>
            <br>
            <h2>". $prenom_reservation ."</h2>
            <br>
            <h1>". $produit_reservation ."</h1>
            <h1>Vous avez réservé l'ensemble à ces dates:</h1>
            <h2>". $datedebut ."</h2>
            <h2>". $datefin ."</h2>
  ";
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=UTF-8';

mail($mail_reservation,'Mail confirmation de réservation',$contenu,implode("\r\n", $headers));
}
?>
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