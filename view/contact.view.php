<?php session_start(); // L'utilisateur est connecté
include '../controler/header.ctrl.php'; ?>
<link rel="stylesheet" href="../framework/contact.css">
<img src="../view/Images/backgroundContact.jpg" alt="Background" class="imgBackground">


</header>


    <div class="contacter"> <!-- On regroupe les données de contact du club et du professeur -->
      <h2>Téléphone</h2>
        <p>Le Club : 04.76.18.25.28</p>
        <p>Maître Bio : 06.08.70.84.08</p>
        <h2>Mail</h2>
      <div class="mail">
        <p>Maître Bio :</p> <a href=mailto:<rassavong.bio@free.fr>rassavong.bio@free.fr</a>
      </div>

    </div>

    <h2>Plan</h2>
    <div class="map"> <!-- On ajoute la carte afin de pouvoir donner l'adresse du gymnase où se tiennent les cours -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d703.0171722275511!2d5.726383465232544!3d45.18570576950216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af45e647eca63%3A0x850a479ce6fc3792!2sCentre%20Sportif%20Hoche!5e0!3m2!1sfr!2sfr!4v1573660805089!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

    <?php include '../view/footer.view.php' ?>
  </body>
</html>
