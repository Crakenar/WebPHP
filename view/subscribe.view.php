<?php include '../controler/header.ctrl.php' ?>
  <link rel="stylesheet" href="../framework/subscribe.css">

  <img src="../view/Images/backgroundMonCompte.jpg" alt="Background" class="imgBackground">

  </header>

<?php if(!(isset($_POST['validerInscription'])) && !(isset($_POST['validerInscriptionMineur']))){ ?> <!-- Si l'utilisateur n'a pas encore tenté de s'inscrire, le formulaire apparaît -->
    <h2>Inscription : </h2>
    <script>
    function confirmer(){
      return confirm("Êtes-vous sur de vouloir continuer l'inscripton ?");
    }
    </script>
  <form action="../controler/subscribe.ctrl.php" method="post" onsubmit="return confirmer()">
      <p>
      Nom :
      <br>
      <input type="text" name="nom" required maxlength="50"/>
      <br>
      Prenom :
      <br>
      <input type="text" name="prenom" required maxlength="50"/>
      <br>
      Sexe :
      <br>
      h
      <input type="radio" name="sexe" value="h" required/>
      f
      <input type="radio" name="sexe" value="f" required/>
      <br>
      Date de naissance :
      <br>
      <input type="date" name="date_naissance" required />
      <br>
      Téléphone (téléphone du responsable légal si mineur) :
      <br>
      <input type="tel" name="telephone" requiered pattern="0[0-9]{9}"/>
      <br>
      Poids :
      <br>
      <input type="number" name="poids" required value="65" min="20" max="200"/>
      <br>
      Taille :
      <br>
      <input type="number" name="taille" required value="170" min="100" max="250"/>
      <br>
      Paiement :
      <br>
      Effectué
      <input type="radio" name="paiement" value="true" required/>
      Non Effectué
      <input type="radio" name="paiement" value="false" required/>
      <br>
      Certificat médical :
      <br>
      Donné
      <input type="radio" name="certificat_medical" value="true" required/>
      Non Donné
      <input type="radio" name="certificat_medical" value="false" required/>
      <br>
      Mail :
      <br>
      <input type="mail" name="mail" required maxlength="50"/>
      <br>
      <input class="bouton" type="submit" name="validerInscription" value="Valider" />
      <input class="bouton" type="reset" value="Réinitialiser le formulaire" />
      </p>
  </form>
<?php }else if(isset($_POST['validerInscription']) && (int)((time()-strtotime($_POST['date_naissance']))/3600/24/365)<18){?> <!-- Si l'utilisateur a validé son inscription et qu'il est mineur, alors une confirmation est demandée -->
  <script>
  function confirmer(){
    return confirm("Êtes-vous sur de vouloir continuer l'inscription ?");
  }
  </script>
  <form action="../controler/subscribe.ctrl.php" method="post" onsubmit="return confirmer()">
      <p>
      <input type="hidden" name="nom" value="<?php echo $_POST['nom'];?>" >
      <input type="hidden" name="prenom" value="<?php echo $_POST['prenom'];?>" >
      <input type="hidden" name="sexe" value="<?php echo $_POST['sexe'];?>" >
      <input type="hidden" name="date_naissance" value="<?php echo $_POST['date_naissance'];?>" >
      <input type="hidden" name="telephone" value="<?php echo $_POST['telephone'];?>" >
      <input type="hidden" name="taille" value="<?php echo $_POST['taille'];?>" >
      <input type="hidden" name="poids" value="<?php echo $_POST['poids'];?>" >
      <input type="hidden" name="paiement" value="<?php echo $_POST['paiement'];?>" >
      <input type="hidden" name="certificat_medical" value="<?php echo $_POST['certificat_medical'];?>" >
      <input type="hidden" name="mail" value="<?php echo $_POST['mail'];?>" >
      Nom du responsable légal 1 : <!-- Affiche des zones textes pour renseigner les infos principales sur le/les potentiels responsables légaux -->
      <br>
      <input type="text" name="nomResp1" required maxlength="50"/>
      <br>
      Prenom du responsable légal 1 :
      <br>
      <input type="text" name="prenomResp1" required maxlength="50"/>
      <br>
      Téléphone du responsable légal 1:
      <br>
      <input type="tel" name="telephoneResp1" required pattern="0[0-9]{9}"/>
      <br>
      Nom du responsable légal 2 (facultatif) :
      <br>
      <input type="text" name="nomResp2" maxlength="50"/>
      <br>
      Prenom du responsable légal 2 (facultatif) :
      <br>
      <input type="text" name="prenomResp2" maxlength="50"/>
      <br>
      Téléphone du responsable légal 2 (facultatif) :
      <br>
      <input type="tel" name="telephoneResp2" pattern="0[0-9]{9}"/>
      <br>
      <input type="submit" name="validerInscriptionMineur" value="Valider" />
      <input type="reset" value="Réinitialiser le formulaire" />
      </p>
  </form>
  <form action="../controler/subscribe.ctrl.php" method="post">
    <input type="submit" value="Annuler" />
  </form>
<?php }else{?>
  <p> L'adhérent a été inscrit</p>
  <form action="../controler/subscribe.ctrl.php" method="post">
    <input type="submit" value="Continuer les inscriptions" />
  </form>
<?php } ?>
  <?php include '../view/footer.view.php' ?>
</body>
</html>
