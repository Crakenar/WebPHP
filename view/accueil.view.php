<?php session_start(); // L'utilisateur est connecté
include '../controler/header.ctrl.php'; ?>
<link rel="stylesheet" href="../framework/accueil.css">

<img src="../view/Images/backgroundAccueil.jpg" alt="Background">

</header>



<?php foreach ($articles as $value){ ?> <!-- On parcourt l'ensemble de la liste des articles -->
  <article class=""> <!-- On utilise une balise article afin que chaque article puisse être affiché comme tel -->
    <h2> <?php echo $value->getTitre()?></h2> <!-- On récupère et on écrit le titre de l'article -->
    <img class="imgArticles" src="../view/Images/<?php echo $value->getMedia()?>">
    <p> <?php echo $value->getContenu()?> </p> <!-- On récupère et on écrit le contenu de l'article -->
    <br>
  </article>
<?php } ?>

<?php include '../view/footer.view.php' ?>
</body>
</html>
