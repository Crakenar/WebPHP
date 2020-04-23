<!-- Page regroupant les informations sur le professeur -->
<?php session_start(); // L'utilisateur est connecté
include '../controler/header.ctrl.php'; ?>
<link rel="stylesheet" href="../framework/professeur.css">

  <img src="../view/Images/backgroundEquipe.jpg" alt="Background" class = "imgBackground">

</header>


    <div class="Presentation">
      <h2> Professeur </h2>
      <div class="Contenue">
          <img src="Images/photoProf.jpg" alt="photo du professeur">
          <div class="">
            <h3> Rassavong Somchanh </h3>
            <p>Professeur de Muay thaï originaire du Laos, il gère aujourd'hui l'association Grenoble Muay Thaï et enseigne sa discipline dans les environs de Grenoble.</p>
          </div>
      </div>
    </div>
    <?php include '../view/footer.view.php' ?>
  </body>
</html>
