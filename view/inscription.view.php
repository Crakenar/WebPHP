<!-- Page permettant de s'inscrire au club grâce à des informations sur les modalités d'inscription ainsi qu'un certificat médical et une feuille d'inscriptions vierges, et du prix de l'inscription pour l'année -->
<?php session_start(); // L'utilisateur est connecté
include '../controler/header.ctrl.php'; ?>
<link rel="stylesheet" href="../framework/inscription.css">
<img src="../view/Images/backgroundInformation.jpg" alt="Background" class="imgBackground">
<!-- Permet l'ajout de l'icone download -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</header>

<h2>Deroulement inscription</h2>
<p>Pour vous inscrire au club vous devez être en possession : <br>
   Un certificat Medical datant de moins de 3 ans sans complications de sante entre temps. <br>
   La feuille d'inscription du club telechargeable sur le site mais aussi disponible au club. <br>
   Un cheque de 235 Euros au nom de l'association. </p>

<h2>Le Certificat medical</h2>
<div class="certificatmedical">
  <img src="../view/Images/certificatMedical.jpg" alt="Certificat Medical">
  <a class="download" href="../view/Images/certificatMedical.jpg" download="certificatMedical.jpg">Certificat Médical    <i class="material-icons">cloud_download</i> </a>
</div>

<h2>Feuille D'inscription</h2>
<div class="feuilleInscription">
  <img src="../view/Images/FeuilleInscription.jpg" alt="Feuille Inscription">
  <a class="download" href="../view/Images/FeuilleInscription.jpg" download="../view/Images/FeuilleInscription.jpg">Feuille Inscription    <i class="material-icons">cloud_download</i> </a>
</div>

<h2>Cheque</h2>
  <div class="Cheque">
  <img src="../view/Images/cheque-specimen.png" alt="image d'un cheque de 235 euros au nom de l'association Grenoble Muay Thai">
</div>


<?php  include '../view/footer.view.php' ?>
