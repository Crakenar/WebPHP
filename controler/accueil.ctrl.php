<?php
require_once('../model/Actualite.class.php');
require_once('../model/DAO.class.php');


$DAO = new DAO();
$articles=$DAO->getAllArticles(); // Récupère tous les articles présents dans la base de données.

include '../view/accueil.view.php' ?>
