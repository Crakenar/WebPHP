<!-- Fichier consacré à la page regroupant les informations de chaque adhérent et accessible uniquement par l'administrateur -->
<?php include '../controler/header.ctrl.php' ?>
    <link rel="stylesheet" href="../framework/gestionAdherents.css">
    <img src="../view/Images/backgroundInformation.jpg" alt="Background" class="imgBackground">
 </header>
 <section class="page">
 <br>
 <br>
    <h1>Gestion des adherents :</h1>
    <?php if(!isset($_POST['validerAdherentAModifier']) && !isset($_POST['validerAdherentAConsulter']) && !isset($_POST['modifierRespLegaux'])){
    if(!isset($_POST['supprimerAdherent']) && !isset($_POST['modifierAdherent'])){?>
      <form action="../controler/gestionAdherents.ctrl.php#Adherents" method ="post">
      <input class="bouton" type="submit" name ="supprimerAdherent" value="Supprimer un adhérent">
      <input class="bouton" type="submit" name ="modifierAdherent" value="Modifier un adhérent">
      <input class="bouton" type="submit" name ="consulterAdherent" value="Consulter un adhérent">
      <br>
      <h2>Trier par : </h2>

      <table class="tableau">
        <!--Menu de recherche des adherents en fonction de differents criteres -->
        <tr>
            <th><input class="bouton" type="submit" name ="nom" value="Nom"> <label for=""></label></th>
            <th><input class="bouton" type="submit" name ="prenom" value="Prenom"> <label for=""></label></th>
            <th><input class="bouton" type="submit" name ="sexe" value="Sexe"> <label for=""></label></th>
            <th><input class="bouton" type="submit" name ="dateNaissance" value="Date de naissance"> <label for=""></label></th>
            <th><input class="bouton" type="submit" name ="poids" value="Poids"> <label for=""></label></th>
            <th><input class="bouton" type="submit" name ="taille" value="Taille"> <label for=""></label></th>
            <th><input class="bouton" type="submit" name ="paiement" value="Paiement"> <label for=""></label></th>
            <th><input class="bouton" type="submit" name ="certificatMedical" value="Certificat medical"> <label for=""></label></th>
            <th>Téléphone</th>
        </tr>
      <?php }  else {?>
        <?php if(isset($_POST['supprimerAdherent'])){?> <!-- Si l'utilisateur décide de supprimer un adhérent, il recevra une demande de confirmation -->
        <script>
        function confirmer(){
          return confirm("Êtes-vous sur de vouloir supprimer ces adhérents ?");
        }
        </script>
      <?php } ?>
        <form action="../controler/gestionAdherents.ctrl.php#Adherents" method ="post" onsubmit="return confirmer();">
          <?php if(isset($_POST['supprimerAdherent'])){?> <!-- Si l'utilisateur reclique pour supprimer un adhérent -->
        <h2>Cochez les adhérents à supprimer : </h2>
      <?php } else{?>
        <h2>Cochez l'adhérent à modifier</h2>
      <?php } ?>
        <table> <!-- Donne une table regroupant tous les attributs modifiables pour un adhérent -->
          <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Sexe</th>
              <th>Date de naissance</th>
              <th>Poids</th>
              <th>Taille</th>
              <th>Paiement</th>
              <th>Certificat medical</th>
              <th>Téléphone</th>
          </tr>
    <?php }?>
    <?php //Affichage des adherents en fonctions des criteres de selections demandes
            foreach ($utilisateur as $value) { ?>
            <tr>
                <td> <?php echo $value->getNom(); echo '  '; ?></td>
                <td> <?php echo $value->getPrenom(); echo '  '; ?></td>
                <td> <?php echo $value->getSexe() ?></td>
                <td> <?php echo $value->getDateNaissance(); echo '  '; ?></td>
                <td> <?php echo $value->getPoids(); echo '  '; ?></td>
                <td> <?php echo $value->getTaille(); echo '  '; ?></td>
                <td> <?php if($value->getPaiement()=='true'){ echo 'effectué';}else{echo 'non effectué';}; echo '  '; ?></td>
                <td> <?php if($value->getCertifMedical()=='true'){ echo 'donné';}else{echo 'non donné';}; ?></td>
                <td> <?php echo $value->getTelephone(); echo ' ';?></td>
                <?php if(isset($_POST['supprimerAdherent'])){ // Si le bouton supprimerAdherent est choisi, alors cela affiche un checkbox qui retourne le numéro d'adhérent de l'adhérent sélectionné
                        if($value->getNumAdherent()==1){?>

                          <td><input type="checkbox" id=<?php echo $value->getNumAdherent()?> name =<?php echo $value->getNumAdherent()?> disabled></td>
                  <?php } else{ ?>
                          <td><input type="checkbox" id=<?php echo $value->getNumAdherent()?> name =<?php echo $value->getNumAdherent()?>></td>
                  <?php }
                          }
                       if(isset($_POST['modifierAdherent'])){?> <!-- Si le bouton modifierAdherent est choisi, alors cela affiche des boutons radios qui retourne le numéro d'adhérent des adhérents sélectionnés -->
                <td><input type="radio" id=<?php echo $value->getNumAdherent()?> name =adherentAModifier value=<?php echo $value->getNumAdherent()?> checked></td>
                <?php } ?>
                <?php if(isset($_POST['consulterAdherent'])){?> <!-- Si le bouton consulterAdherent est choisi, alors cela affiche des boutons radios qui retourne le numéro d'adhérent des adhérents sélectionnés -->
                <td><input type="radio" id=<?php echo $value->getNumAdherent()?> name =adherentAConsulter value=<?php echo $value->getNumAdherent()?> checked></td>
                <?php } ?>
            </tr>
          <?php } ?>
    </table>

          <?php if(isset($_POST['supprimerAdherent'])){?> <!-- Si le bouton supprimerAdherent est sélectionné, deux nouveaux boutons permettant de valider ou décocher la sélection seront créés -->
              <input class="bouton" type="submit" name ="validerSuppression" value="Valider">
              <br>
              <input class="bouton" type="reset" value="Décocher tout">
          <?php }else if(isset($_POST['modifierAdherent'])){?> <!-- Si le bouton modifierAdherent est sélectionné, un nouveau bouton permet de valider la sélection -->
              <input class="bouton" type="submit" name ="validerAdherentAModifier" value="Valider">
          <?php } else if(isset($_POST['consulterAdherent'])){?> <!-- Si le bouton consulterAdherent est sélectionné, un nouveau bouton permet de valider la sélection -->
              <input class="bouton" type="submit" name ="validerAdherentAConsulter" value="Valider">
          <?php }?>
          </div>
        </form>
        <?php if(isset($_POST['supprimerAdherent']) || isset($_POST['modifierAdherent'])){?>
        <form action="../controler/gestionAdherents.ctrl.php#Adherents" method ="post">
          <input class="bouton" type="submit" name ="annuler" value="Annuler">
        </form>


  <?php }
} else if(isset($adherentAModifier)){?> <!-- Si un adherent a été sélectionné, alors une page permettant de modifier ce dernier s'ouvre -->
  <script>
  function confirmer(){
    return confirm("Êtes-vous sur de vos modifications sur cet adhérent ?");
  }
  </script>
  <h2>Modification de l'adhérent</h2>
  <form action="../controler/gestionAdherents.ctrl.php#Adherents" method="post" onsubmit="return confirmer()">
      <p>
      Nom :
      <br>
      <input type="text" name="nom" value=<?php echo $adherentAModifier[0]->getNom() ?> required maxlength="50"/>
      <br>
      Prenom :
      <br>
      <input type="text" name="prenom" value=<?php echo $adherentAModifier[0]->getPrenom() ?> required maxlength="50"/>
      <br>
      Sexe :
      <br>
      <?php if($adherentAModifier[0]->getSexe()=='h'){ ?>
        h
        <input type="radio" name="sexe" value="h" checked required/>
        f
        <input type="radio" name="sexe" value="f" required/>
      <?php } else { ?>
        h
        <input type="radio" name="sexe" value="h" required/>
        f
        <input type="radio" name="sexe" value="f" checked required/>
      <?php } ?>
      <br>
      Date de naissance :
      <br>
      <input type="date" name="date_naissance" value=<?php echo $adherentAModifier[0]->getDateNaissance() ?> required />
      <br>
      Téléphone :
      <br>
      <input type="tel" name="telephone" value=<?php echo $adherentAModifier[0]->getTelephone()?> required pattern="0[0-9]{9}"/>
      <br>
      Poids :
      <br>
      <input type="number" name="poids" value=<?php echo $adherentAModifier[0]->getPoids()?> required value="65" min="20" max="200"/>
      <br>
      Taille :
      <br>
      <input type="number" name="taille" value=<?php echo $adherentAModifier[0]->getTaille()?> required value="170" min="100" max="250"/>
      <br>
      Paiement :
      <br>
      <?php if($adherentAModifier[0]->getPaiement()=='true'){ ?>
        effectué
        <input type="radio" name="paiement" value="true" checked required/>
        non effectué
        <input type="radio" name="paiement" value="false" required/>
      <?php } else { ?>
        effectué
        <input type="radio" name="paiement" value="true" required/>
        non effectué
        <input type="radio" name="paiement" value="false" checked required/>
      <?php } ?>
      <br>
      Certificat médical :
      <br>
      <?php if($adherentAModifier[0]->getCertifMedical()=='true'){ ?>
        donné
        <input type="radio" name="certificatMedical" value="true" checked required/>
        non donné
        <input type="radio" name="certificatMedical" value="false" required/>
      <?php } else { ?>
        donné
        <input type="radio" name="certificatMedical" value="true" required/>
        non donné
        <input type="radio" name="certificatMedical" value="false" checked required/>
      <?php } ?>
      <input type="hidden" name='numAdh' value='<?php echo $adherentAModifier[0]->getNumAdherent()?>'/>
      <br>
        <input type="submit" name='validerModification' value="Valider" />
      </p>
    </form>
    <form action="../controler/gestionAdherents.ctrl.php#Adherents" method="post">
    <input type="submit" value="Annuler" />
    </form>
<?php } else if(isset($adherentAConsulter)){?> <!-- Si un adherent a été sélectionné, une page s'ouvre avec toutes les informations le concernant sous forme de liste -->
  <section class="adherent">
        <h2>Informations de l'adhérent :</h2>
        <p>
        Nom :
        <?php echo $adherentAConsulter[0]->getNom() ?>
        <br>
        Prenom :
        <?php echo $adherentAConsulter[0]->getPrenom() ?>
        <br>
        Sexe :
        <?php if($adherentAConsulter[0]->getSexe()=='h'){ ?>
          Homme
        <?php } else { ?>
          Femme
        <?php } ?>
        <br>
        Date de naissance :
        <?php echo $adherentAConsulter[0]->getDateNaissance() ?>
        <br>
        Téléphone:
        <?php echo $adherentAConsulter[0]->getTelephone()?>
        <br>
        Poids :
        <?php echo $adherentAConsulter[0]->getPoids()?>
        <br>
        Taille :
        <?php echo $adherentAConsulter[0]->getTaille()?>
        <br>
        Paiement :
        <?php if($adherentAConsulter[0]->getPaiement()=='true'){ ?>
          effectué
        <?php } else { ?>
          non effectué
        <?php } ?>
        <br>
        Certificat médical :
        <?php if($adherentAConsulter[0]->getCertifMedical()=='true'){ ?>
          donné
        <?php } else { ?>
          non donné
        <?php } ?>
      </p>
</section>
<section class="adherent">
  <h2>Information sur le compte utilisateur de l'adhérent :</h2> <!-- Ses informations d'utilisateur sont également affichées -->
  <p>
  Login :
  <?php echo $utilisateurAConsulter->getLogin() ?>
  <br>
  Mail :
  <?php echo $utilisateurAConsulter->getMail() ?>
  <br>
  Role :
  <?php echo $utilisateurAConsulter->getRole() ?>
  <br>
  </p>
</section>
<?php  if($age<18){?> <!-- Enfin, si l'adhérent est mineur, les informations sur les responsables légaux sont aussi affichées -->
  <h2>Informations sur les responsables légaux de l'adherent :</h2>
  <form action="../controler/gestionAdherents.ctrl.php#Adherents" method="post">
    <?php foreach ($responsablesLegauxAConsulter as $value) {?>
          <p>Nom du responsable legal <?php echo $nbRespLeg?> :
          <?php echo $value->getNom()?>
          <br>
          Prénom du responsable legal <?php echo $nbRespLeg?> :
          <?php echo $value->getPrenom()?>
          <br>
          Téléphone du responsable legal <?php echo $nbRespLeg?> :
          <?php echo $value->getTelephone()?>
          <br>
    <?php $nbRespLeg++;} ?>
    <input type="hidden" name="adherentAConsulterModifRespLeg" value="<?php echo $adherentAConsulter[0]->getNumAdherent();?>" >
    <input type="submit" name="modifierRespLegaux" value="Modifier les responsables légaux" />
    </form>
  <?php } ?>
  <form action="../controler/gestionAdherents.ctrl.php#Adherents" method="post">
  <input class="bouton" type="submit" value="Retour" />
  </form>
<?php } else {?> <!-- Sinon, demande une confirmation puis affiche les informations sur les responsables légaux -->
  <script>
  function confirmer(){
    return confirm("Êtes-vous sur de vos modifications ?");
  }
  </script>
  <section class="adherent">
        <form action="../controler/gestionAdherents.ctrl.php#Adherents" method="post" onsubmit="return confirmer()">
            <p>
            <input type="hidden" name="numResp1" value="<?php echo $responsablesLegauxAConsulter[0]->getNumResponsableLegal();?>" >
            Nom du responsable légal 1 :
            <br>
            <input type="text" name="nomResp1" value=<?php echo $responsablesLegauxAConsulter[0]->getNom()?> required maxlength="50"/>
            <br>
            Prenom du responsable légal 1 :
            <br>
            <input type="text" name="prenomResp1" value=<?php echo $responsablesLegauxAConsulter[0]->getPrenom()?> required maxlength="50"/>
            <br>
            Téléphone du responsable légal 1:
            <br>
            <input type="tel" name="telephoneResp1" value=<?php echo $responsablesLegauxAConsulter[0]->getTelephone()?> required pattern="0[0-9]{9}"/>
            <br>
            <?php if(isset($responsablesLegauxAConsulter[1])) {?>
              <input type="hidden" name="numResp2" value="<?php echo $responsablesLegauxAConsulter[1]->getNumResponsableLegal();?>" >
              Nom du responsable légal 2 :
              <br>
              <input type="text" name="nomResp2" value=<?php echo $responsablesLegauxAConsulter[1]->getNom()?> requiered maxlength="50"/>
              <br>
              Prenom du responsable légal 2 :
              <br>
              <input type="text" name="prenomResp2" value=<?php echo $responsablesLegauxAConsulter[1]->getPrenom()?> requiered maxlength="50"/>
              <br>
              Téléphone du responsable légal 2 :
              <br>
              <input type="tel" name="telephoneResp2" value=<?php echo $responsablesLegauxAConsulter[1]->getTelephone()?> requiered pattern="0[0-9]{9}"/>
              <br>
            <?php } ?>
            <input type="submit" name="validerModificationRespLeg" value="Valider" />
            </p>
        </form>
  </section>
  <form action="../controler/subscribe.ctrl.php" method="post">
    <input type="submit" value="Annuler" />
  </form>
   </section>
<?php }?>

</body>
</html>
<?php include '../view/footer.view.php'?>
