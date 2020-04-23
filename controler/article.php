<?php
  $bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8","root","");


  if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']); //securiser les variables avec htmlspecialchars

    $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?'); // Préparation de la requête afin que celle-ci soit exécutée plusieurs fois avec différents id.
    $article->execute(array($get_id)); // La requête est effectuée pour chaque id dans l'array list

    if ($article->rowCount()==1) { // Vérifie que l'article courant existe.
      $article = $article->fetch(); // Cherche l'article courant dans la base de données.
      $id = $article['id']; // Récupère dans chaque variable un attribut de l'article courant.
      $titre = $article['titre'];
      $contenu = $article['contenu'];
    }else {
      die('Cet article n\'existe pas !');
    }

  }else {
    die('Erreur');
  }
 ?>


 <!DOCTYPE html>
 <?php session_start();
 include '../controler/header.ctrl.php'; ?>
   <link rel="stylesheet" href="../framework/accueil.css">

   <img src="../view/Images/backgroundAccueil.jpg" alt="Background">
   </header>
     <title>Article</title>
   </head>
   <body>
     <div class="contenu">
       <img  class="mini" src="miniatures/<?= $id ?>.jpg" alt="" width="400">
       <style media="screen">
          .mini{
            width: 400px;
            margin-top: 50px;
          }
          .contenu{
            display: flex;
            flex-direction: column;
            align-items: center;
          }
       </style>
       <h1><?= $titre ?></h1>
       <p><?= $contenu ?></p>
       </div>
       <?php include '../view/footer.view.php' ?>


     </body>
     </html>
