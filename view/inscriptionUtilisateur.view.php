<?php include '../controler/header.ctrl.php' ?>
  <link rel="stylesheet" href="../framework/monCompte.css">

  <img src="../view/Images/backgroundMonCompte.jpg" alt="Background" class="imgBackground">

  </header>
    <h2>Inscription : </h2>
    <script>
    function confirmer(){
      return confirm("Êtes-vous sur de vouloir continuer l'inscripton ?");
    }
    </script>
    <?php if(!isset($inscription_confirme)){?> <!-- Si l'inscription n'a pas été confirmée (l'utilisateur n'a jamais tenté de valider), cela recrée le formulaire permettant de s'inscrire -->
  <form class="inscription" action="../controler/inscriptionUtilisateur.ctrl.php" method="post" onsubmit="return confirmer()">
      <p>
      Login :
      <br>
      <input type="text" name="identifiant" required maxlength="25"/> <!-- Renvoie un espace texte de 25 caractères de longueur -->
      <br>
      Mail :
      <br>
      <input type="mail" name="mail" required maxlength="50"/>
      <br>
      Mot de passe :
      <br>
      <input type="password" name="mot_de_passe" required maxlength="50"/>
      <br>
      Confirmez votre mot de passe :
      <br>
      <input type="password" name="confirmerMot_de_passe" required maxlength="50"/>
      <br>
      <input class="bouton" type="submit" name="validerInscriptionUtilisateur" value="Valider" />
      <input class="bouton" type="reset" value="Réinitialiser le formulaire" />
      </p>
  </form>
<?php }else if($inscription_confirme==0){?> <!-- Si le mot de passe n'est pas le même que celui entré dans la confirmation, cela sauvegarde l'identifiant et le mail mais le mot de passe est redemandé -->
  <form action="../controler/inscriptionUtilisateur.ctrl.php" method="post" onsubmit="return confirmer()">
      <input type="hidden" name="identifiant" value="<?php echo $_POST['identifiant'];?>" >
      <input type="hidden" name="mail" value="<?php echo $_POST['mail'];?>" >
      <p>
      Reconfirmez votre mot de passe
      <br>
      <br>
      Mot de passe :
      <br>
      <input type="password" name="mot_de_passe" required maxlength="50"/>
      <br>
      Confirmez votre mot de passe :
      <br>
      <input type="password" name="confirmerMot_de_passe" required maxlength="50"/>
      <br>
      <input type="submit" name="validerInscriptionUtilisateur" value="Valider" />
      <input type="reset" value="Réinitialiser le formulaire" />
      </p>
  </form>
<?php } else if($inscription_confirme==1){?> <!-- Si le login choisi est déjà pris, cele sauvegarde le mail, le mot de passe et la confirmation, mais un autre login est demandé -->
  <form action="../controler/inscriptionUtilisateur.ctrl.php" method="post" onsubmit="return confirmer()">
      <input type="hidden" name="mail" value="<?php echo $_POST['mail'];?>" >
      <input type="hidden" name="mot_de_passe" value="<?php echo $_POST['mot_de_passe'];?>" >
      <input type="hidden" name="confirmerMot_de_passe" value="<?php echo $_POST['confirmerMot_de_passe'];?>" >
      <p>
      Le login <?php echo $_POST['identifiant'] ; ?> est déjà pris, veuillez en choisir un autre
      <br>
      <br>
      Login :
      <br>
      <input type="text" name="identifiant" required maxlength="25"/>
      <br>
      <input class="bouton" type="submit" name="validerInscriptionUtilisateur" value="Valider" />
      <input class="bouton" type="reset" value="Réinitialiser le formulaire" />
      </p>
  </form>
<?php } else {?> <!-- Si l'inscription a été validée, retourne les informations entrées précédemment -->
  <p>Vous avez été inscrit, pour fusionner ce compte avec un autre rendez vous sur la page de votre compte.
    <form action="../controler/monCompte.ctrl.php" method="post">
        <input type="hidden" name="identifiant" value="<?php echo $utilisateur->getLogin(); ?>" >
        <input type="hidden" name="mot_de_passe" value="<?php echo $utilisateur->getPassword(); ?>" >
        <input type="submit" name="accesCompte" value="Acceder à mon compte" />
        </p>
    </form>
<?php } ?>
  <?php include '../view/footer.view.php' ?>
</body>
</html>
