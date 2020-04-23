<?php
  $bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8","root","");

  $articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC'); // Récupère l'ensemble des articles de la base de données par ordre croissant de leur date de publication.

  include '../view/index.view.php';
 ?>
