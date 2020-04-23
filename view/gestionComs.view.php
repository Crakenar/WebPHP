<?php include '../controler/header.ctrl.php' ?>
    <link rel="stylesheet" href="../framework/gestionAdherents.css">
    <img src="../view/Images/backgroundInformation.jpg" alt="Background" class="imgBackground">
 </header>
 <br>
 <br>
 <section id = "Commentaires"></section>
 <h1>Gestion des commentaires</h1>
 <!--Menu de recherche des adherents en fonction de differents criteres -->

<h2>Article</h2>
<form action="../controler/gestionArticles.ctrl.php" method ="post">
  <table>
    <tr>
        <th> Numero d'article </td>
        <th> Titre </td>
        <th> Date de dernière édition</td>
        <th> Contenu </td>
    </tr>
      <tr> <!-- Création d'un tableau affichant les informations du commentaire précédemment sélectionné ainsi qu'un bouton pour revenir aux articles -->
          <td> <?php echo $article->getId(); ?></td>
          <td> <?php echo $article->getTitre(); ?></td>
          <td> <?php echo $article->getDateEdit(); ?></td>
          <td> <?php echo $article->getContenu(); ?></td>
          <td> <input type="submit" name ="retour" value="Retour aux articles"/></td>
      </tr>
    </table>
</form>
<h2>Commentaires</h2>
<?php if(isset($_POST['supprimerComs'])){ ?> <!-- Si l'utilisateur décide de supprimer le commentaire, un message de confirmation d'affichera -->
<script>
function confirmer(){
  return confirm("Êtes-vous sur de vouloir supprimer ces commentaires ?");
}
</script>
<?php } ?>
<?php if(sizeof($commentaires)>0){?> <!-- S'il existe au moins un commentaire -->
 <form action="../controler/gestionComs.ctrl.php#Commentaires" method ="post" onsubmit="return confirmer()">
   <?php if(!isset($_POST['supprimerComs'])){?> <!-- Si l'utilisateur ne supprime pas de commentaires, alors le bouton pour en supprimer s'affiche -->
     <input type="submit" name ="supprimerComs" value="Supprimer des commentaires"/>
   <?php } ?>
   <input type="hidden" name="comsAConsulter" value="<?php echo $_POST['comsAConsulter']; ?>"/>
 <div class = "criteres">
        <table> <!-- Crée un nouveau tableau afin d'afficher les informations sur chaque commentaire selon les attributs suivants -->
          <tr>
              <th> Auteur </th>
              <th> Article</th>
              <th> Date </th>
              <th> Contenu </th>
          </tr>
    <?php
    //Affichage des adherents en fonctions des criteres de selections demandes
            foreach ($commentaires as $value) { ?>
            <tr>
                <td> <?php echo $DAO->getUtilisateurById($value->getNumAdh())->getLogin(); ?></td>
                <td> <?php echo $value->getNumArticle(); ?></td>
                <td> <?php echo $value->getDateCom(); ?></td>
                <td> <?php echo $value->getContenuCom(); ?></td>
                <?php if(isset($_POST['supprimerComs'])){ ?> <!-- Si le bouton supprimerComs est sélectionné, une checkbox s'affiche -->
                  <td> <input type="checkbox" id=<?php echo $value->getNumCom(); ?> name="<?php echo $value->getNumCom(); ?>"></td>
                <?php } ?>
            </tr>
          <?php } ?>
    </table>
  </div>
  <?php if(isset($_POST['supprimerComs'])){?>
    <input type="submit" name ="validerSuppression" value="Valider"/>
    <br>
    <input type="reset" value="Décocher tout"/>
  <?php } ?>

  </form>
<?php } else {?> <!-- if (sizeof($commentaires)==0) -->
  <p>Il n'y a aucun commentaire pour cet article</p>
  <?php }?>
  <?php if(isset($_POST['supprimerComs'])){?>
    <form action="../controler/gestionComs.ctrl.php#Commentaires" method ="post">
      <input type="submit" name ="annulerSuppression" value="Annuler"/>
      <input type="hidden" name="comsAConsulter" value="<?php echo $_POST['comsAConsulter']; ?>"/>
    </form>
  <?php } ?>
    <?php include '../view/footer.view.php'?>
</body>
</html>
