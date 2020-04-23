<?php session_start();
include '../controler/header.ctrl.php'; ?>
<?php
  $bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8","root","");

  $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC'); // Récupère tous les articles en les triant en fonction de leur date de publication (du plus récent au plus ancien)
 ?>

<link rel="stylesheet" href="../framework/accueil.css">

<img src="../view/Images/backgroundAccueil.jpg" alt="Background">
</header>



</head>
<body>
 <div class="actu">
   <h1>Actualités</h1>

   <a class="redaction" href="redaction.php">Creer un Article</a> <!-- Lien permettant de rédiger un nouvel article -->

   <ul>
     <?php while ($a = $articles->fetch()) { // Parcourt la liste de tous les articles?>
       <li>
         <a class="titre" href="article.php?id=<?= $a['id'] ?>">
         <img src="miniatures/<?= $a['id'] ?>.jpg" alt="" width="200"> <br>
           <?= $a['titre'] ?>  </a>
         <a class="bouton" href="redaction.php?edit=<?= $a['id'] ?>">Modifier</a>  <a class="bouton" href="supprimer.php?id=<?= $a['id'] ?>">Supprimer</a> ____________________<!-- Deux liens permettant de modifier ou supprimer l'article -->
       </li>
    <?php } ?>
   </ul>
 </div>





<?php include '../view/footer.view.php' ?>
</body>
</html>
