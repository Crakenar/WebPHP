<!DOCTYPE html>
<?php session_start();
include '../controler/header.ctrl.php'; ?>
  <link rel="stylesheet" href="../framework/accueil.css">

  <img src="../view/Images/backgroundAccueil.jpg" alt="Background">
  </header>
    <title>Redaction</title>
  </head>
  <body>
    <?php if($mode_edition==1){?>
    <h1>Modification d'un article</h1>
     <?php } ?>
     <?php if($mode_edition==0){?>
     <h1>Création d'un article</h1>
      <?php } ?>
    <form class="" method="post" enctype="multipart/form-data">
    <input type="text" name="article_titre" <?php if($mode_edition==1){?> value=" <?= $edit_article['titre']?> " <?php } ?> placeholder="Titre"> <br>
     <textarea name="article_contenu" rows="8" cols="80" placeholder="Contenu de l'article"><?php if($mode_edition==1) { ?><?= $edit_article['contenu']?><?php } ?></textarea> <br>
     <?php if ($mode_edition == 0) { ?>
       <input type="file" name="miniature" value=""> <br>
     <?php } ?>
      <input type="submit" name="" value="Envoyer l'article">
    </form>
    <br>
    <?php if (isset($message)){ echo $message;} ?>
    <br>
    <a href="index.php">retour</a>

    <?php include '../view/footer.view.php' ?>
    </body>
    </html>
