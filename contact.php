<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;900&display=swap" rel="stylesheet">
    <title>OOTD</title>
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

<!--Formulaire -->
    <h1 class="title-contact">Contact</h1>
    <section class="formu" id="Formulaire">
        <main class="styleform">
            <form action="" method="post">
                <div>
                <h3>Mail*</h3>
                <input type="email" name="mail" required>
                <h3>Nom*</h3>
                <input type="text" name="nom" required>
                <h3>Prénom*</h3>
                <input type="text" name="prenom" required>                    
                </div>
                <div>
                    <h3>Votre Message</h3>
                <textarea class="arg" type="text" name="message" cols="40"
                    rows="5" maxlength="500" spellcheck="true"></textarea>
                <p class="formbtn">
                    <input type="submit" name="submit" value="Envoyer">
                </p>
                </div>
                <?php
//code pour envoyer les données du formulaire dans la base de données
INCLUDE ("connexion.php");
if(isset($_POST['submit'])){
$nom_contact=$_POST['nom'];
$prenom_contact=$_POST['prenom'];
$mail_contact=$_POST['mail'];
$message_contact=$_POST['message'];

$requete="INSERT INTO `contact`(`nom_contact`, `prenom_contact`, `mail_contact`, `message_contact`) VALUES ('$nom_contact','$prenom_contact','$mail_contact','$message_contact')";
$db->query($requete);
echo "<h2>Message envoyé</h2>";}
// header('Location:contact.php');

?>
            </form>
        </main>
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