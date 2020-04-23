<?php include '../controler/header.ctrl.php' ?>
    <link rel="stylesheet" href="../framework/gestionArticles.css">
    <img src="../view/Images/backgroundInformation.jpg" alt="Background" class="imgBackground">
 </header>
 <br>
 <br>
    <h1>Gestion des articles</h1>
 <!--Menu de recherche des articles en fonction de differents criteres -->
 <?php if(!isset($_POST["consulterComs"]) && !isset($_POST["modifierArticle"]) && !isset($_POST["supprimerArticle"]) && !isset($_POST["validerModifierArticle"])&& !isset($_POST["creerArticle"])){?>
 <form action="../controler/gestionArticles.ctrl.php" method ="post">
   <?php if($role!='moderateur'){?>
     <input class="bouton" type="submit" name ="creerArticle" value="Créer un article">
     <input class="bouton" type="submit" name ="supprimerArticle" value="Supprimer un article">
     <input class="bouton" type="submit" name ="modifierArticle" value="Modifier un article">
   <?php } ?>
   <input class="bouton" type="submit" name ="consulterComs" value="Consulter les commentaires">
</form>
<?php } ?>
<br>
<?php if(!isset($_POST["validerModifierArticle"]) && !isset($_POST["creerArticle"])){ ?>
<?php if(isset($_POST["consulterComs"])){ ?>
 <form action="../controler/gestionComs.ctrl.php" method ="post">
<?php } else { ?>
  <?php if(isset($_POST['supprimerArticle'])){?> <!-- Si l'utilisateur décide de supprimer un adhérent, il recevra une demande de confirmation -->
  <script>
  function confirmer(){
    return confirm("Êtes-vous sur de vouloir supprimer ces articles ?");
  }
  </script>
<?php } ?>
  <form action="../controler/gestionArticles.ctrl.php" method ="post" onsubmit="return confirmer()">
<?php } ?>
 <div class = "criteres">
        <table> <!--Table regroupant tous les attributs pour lesquels il est possible de trier -->
          <tr>
              <th> Numéro d'article </td>
              <th> Titre </td>
              <th> Date de dernière édition </td>
              <th> Nombre de commentaires </td>
          </tr>
    <?php
    //Affichage des articles en fonctions des criteres de selections demandes
            foreach ($articles as $value) { ?>
            <tr>
                <td> <?php echo $value->getId(); ?></td>
                <td> <?php echo $value->getTitre(); ?></td>
                <td> <?php echo $value->getDateEdit(); ?></td>
                <td> <?php echo $DAO->getNbComsByArticle($value->getId()); ?></td>
                <?php if(isset($_POST['consulterComs'])){?> <!--Si l'utilisateur décide de consulter les coms -->
                  <?php if($DAO->getNbComsByArticle($value->getId())==0){?> <!--Pour l'article d'id 0, la possibilité de consulter les commentaires est désactivée -->
                  <td> <input type="radio" id=<?php echo $value->getId()?> name="comsAConsulter" value="<?php echo $value->getId()?>" disabled/></td>
                <?php } else { ?> <!--Sinon, donne la possibilité de consulter les commentaires pour chaque article -->
                    <td> <input type="radio" id=<?php echo $value->getId()?> name="comsAConsulter" value="<?php echo $value->getId()?>"/></td>
                  <?php } ?>
                <?php } else if(isset($_POST['supprimerArticle'])){?> <!--Si l'utilisateur décide de consulter les coms -->
                  <td> <input type="checkbox" id=<?php echo $value->getId()?> name="<?php echo $value->getId()?>" value="on"/></td>
                <?php }  else if(isset($_POST['modifierArticle'])){?> <!--Si l'utilisateur décide de consulter les coms -->
                  <td> <input type="radio" id=<?php echo $value->getId()?> name="articleAModifier" value="<?php echo $value->getId()?>"/></td>
                <?php } ?>
            </tr>
          <?php } ?>
    </table>
    <?php if(isset($_POST['consulterComs'])){?> <!--Demande à valider quel commentaire l'utilisateur veut consulter -->
      <input class="bouton" type="submit" name="validerComsAConsulter" value="Valider"/>
    <?php }else if(isset($_POST['supprimerArticle'])){?>
      <input class="bouton" type="submit" name="validerSupprimerArticle" value="Valider"/>
      <input class="bouton" type="reset" value="Décocher tout"/>
    <?php }else if(isset($_POST['modifierArticle'])){?>
      <input class="bouton" type="submit" name="validerModifierArticle" value="Valider"/>
    <?php } ?>
  </div>

  </form>
<?php } else  if(isset($_POST['validerModifierArticle'])){?> <!-- Si l'utilisateur décide de supprimer un adhérent, il recevra une demande de confirmation -->
  <script>
  function confirmer(){
    return confirm("Êtes-vous sur de vouloir modifier cet article ?");
  }
  </script>
  <form action="../controler/gestionArticles.ctrl.php" method ="post" onsubmit="return confirmer()">
    <input type="hidden" name="numAct" value=<?php echo $articleAModifier->getId() ?> required maxlength="50"/>
    <p>
    Titre :
    <br>
    <input type="text" name="titre" value=<?php echo $articleAModifier->getTitre() ?> required maxlength="50"/>
    <br>
    Contenu :
    <br>
    <input type="text" name="contenu" value=<?php echo $articleAModifier->getContenu() ?> required/>
    <br>
    Média :
    <br>
    <input type="text" name="media" value=<?php echo $articleAModifier->getMedia() ?> required />
    <br>
<input class="bouton" type="submit" name="validerModification" value="Valider"/>
</form>
<?php } else{ ?>
  <form action="../controler/gestionArticles.ctrl.php" method ="post">
    <p>
    Titre :
    <br>
    <input type="text" name="titre" required maxlength="50"/>
    <br>
    Contenu :
    <br>
    <input type="text" name="contenu" required/>
    <br>
    Média :
    <br>
    <input type="text" name="media" required />
    <br>
  <input class="bouton" type="submit" name="creationArticle" value="Valider"/>
  </form>
<?php } ?>
  <form action="../controler/gestionArticles.ctrl.php" method ="post">
  <?php if(isset($_POST['supprimerArticle']) || isset($_POST['consulterComs']) || isset($_POST["modifierArticle"]) || isset($_POST["validerModifierArticle"])|| isset($_POST["creerArticle"])){?>
    <input class="bouton" type="submit" name="annuler" value="Annuler"/>
  <?php }?>
</form>
    <?php include '../view/footer.view.php'?>
</body>
</html>
