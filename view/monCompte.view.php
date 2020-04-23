<?php include '../controler/header.ctrl.php' ?>
  <link rel="stylesheet" href="../framework/monCompte.css">

  <img src="../view/Images/backgroundMonCompte.jpg" alt="Background" class="imgBackground">



  </header>
  <?php if(!isset($_POST["fusionner"])){?>
    <?php if($mdp!=1){ ?> <!-- Si l'utilisateur n'est pas connecté, deux champs de texte lui permettront de se connecter -->
    <div class="connexion">
        <h2>Connexion :</h2>
        <form class="champ" action="../controler/monCompte.ctrl.php" method="post">
            <p>
            Identifiant :
            <br>
            <input type="string" name="identifiant" required/>
            <br>
            Mot de passe :
            <br>
            <input type="password" name="mot_de_passe" required/>
            <br>
            <input class="bouton" type="submit" value="Valider" />
            </p>
        </form>
    </div>
    <?php if($mdp==-1){ ?> <!-- Si l'utilisateur a entré un login qui n'existe pas dans la BDD, alors un message d'erreur s'affiche -->
      <br>
      <p>Identifiant inconnu, si vous n'êtes pas encore inscrit cliquez sur le bouton ci-dessous. </p>
    <?php } else if($mdp==-2){?> <!-- Si l'utilisateur a entré un mot de passe qui ne correspond pas au mot de passe du login entré, alors un message d'erreur s'affiche -->
      <br>
      <p>Mot de passe incorrect, vérifiez votre identifiant et votre mot de passe.</p>
    <?php }?>
    <br>
    <form action="../controler/inscriptionUtilisateur.ctrl.php">
      <input class="bouton" type="submit" value="Pas encore inscrit sur le site" />
    </form>
    <?php } else {?> <!-- Si l'utilisateur est connecté, alors les informations concernant son compte sont affichées -->
      <div class="case">
          <h2>Mon compte :</h2>
          <p>Votre identifiant : <?php echo $utilisateur->getLogin()?></p>
          <br>
          <p>Votre mail : <?php echo $utilisateur->getMail()?></p>
          <br>
          <p>Votre rôle : <?php echo $utilisateur->getRole() // Si l'utilisateur n'est pas simplement "inscrit", alors ses informations d'adhérent sont également affichées ?></p>
          <br>
      </div>

    <?php if( $utilisateur->getRole() != 'inscrit'){
      ?>
      <div class="case">
      <h2>Informations Personnelles :</h2>
      <p>Votre nom : <?php echo $adherent->getPrenom() ?></p>
      <p>Votre prénom : <?php echo $adherent->getNom() ?></p>
      <p>Votre date de naissance : <?php echo $adherent->getDateNaissance() ?></p>
      <p>Votre poids : <?php echo $adherent->getPoids() ?></p>
      <p>Votre taille : <?php echo $adherent->getTaille() ?></p>
      <p>Etat de votre paiement :
      <?php if($adherent->getPaiement()){
        echo "Votre paiement a été remis. ";
      }
      else {
        echo "Votre paiement n'a pas été remis. ";
      } ?>
      </p>
      <p>Votre certificat médical :
      <?php if($adherent->getCertifMedical()){
        echo "Votre certificat médical a été remis. ";
      }
      else {
        echo "Votre certificat n'a pas été remis. ";
      } ?>
      </p>
      <p>Votre sexe :
        <?php if($adherent->getSexe()=='h'){
        echo "Homme";
      }
      else {
        echo "Femme";
      } ?></p>
  <?php  if($age<18){?> <!-- Si l'adhérent est mineur, les informations sur ses responsables légaux sont également affichées -->
    <h2>Informations sur vos responsables légaux :</h2>
      <?php foreach ($responsablesLegaux as $value) {?>
            <p>Nom de votre responsable legal <?php echo $nbRespLeg?> : <?php echo $value->getNom()?></p>
            <p>Prénom de votre responsable legal <?php echo $nbRespLeg?> : <?php echo $value->getPrenom()?></p>
            <p>Téléphone de votre responsable legal <?php echo $nbRespLeg?> : <?php echo $value->getTelephone()?></p>
      <?php $nbRespLeg++;} ?>
    <?php } ?>

    <?php } ?>
</div>


    <form class="formDeco" action="../controler/monCompte.ctrl.php" method="post">
      <input class="bouton" type="submit" name="fusionner" value="Fusionner avec un autre compte" />
    </form>
    <script>
    function confirmer(){
      return confirm("Êtes-vous sur de vouloir vous déconnecter ?");
    }
    </script>
    <form class="formDeco" action="../controler/monCompte.ctrl.php" method="post" onsubmit="return confirmer()">
      <input class="bouton" type="submit" name="deconnect"value="Déconnexion"/>
    </form>

    <?php }
  } else if(isset($_POST["fusionner"])){?>

    <script>
    function confirmer(){
      return confirm("Êtes-vous sur de vouloir fusionner ces deux comptes ?");
    }
    </script>

    <form class="formDeco" action="../controler/monCompte.ctrl.php" method="post" onsubmit="return confirmer()">
      <p>Attention, vous ne pouvez fusionner un compte avec un autre compte que si vous avez un role d'inscrit sur cet autre compte.
      </p>
      <br>
      <br>
      <br>
      Identifiant du premier compte (conservé):
      <br>
      <input type="string" name="identifiant1" required/>
      <br>
      Mot de passe du premier compte (conservé):
      <br>
      <input type="password" name="mot_de_passe1" required/>
      <br>
      Identifiant du second compte :
      <br>
      <input type="string" name="identifiant1" required/>
      <br>
      Mot de passe du second compte:
      <br>
      <input type="password" name="mot_de_passe1" required/>
      <br>
      <input class="bouton" type="submit" name="validerFusion"value="Fusionner"/>
    </form>
  <?php }
    include '../view/footer.view.php' ?>
  </body>
</html>
