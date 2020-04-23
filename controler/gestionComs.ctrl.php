<?php


require_once('../model/Actualite.class.php');
require_once('../model/Commentaire.class.php');
require_once('../model/DAO.class.php');
session_start();

$DAO = new DAO();

$commentaires=$DAO->getAllComsByArticle($_POST['comsAConsulter']); // On récupère tous les commentaires d'un article donné.
$nbSupp=0;
foreach ($commentaires as $value) { // Parcourt la liste des commentaires
  $num=$value->getNumCom(); // On récupère le numCom de chaque commentaire
  if(isset($_POST[$num]) && $_POST[$num]=="on"){
    $DAO->supprimerCom($num-$nbSupp);
    $nbSupp++;
  }
}

if(isset($_POST['supprimer'])){ // Si l'utilisateur clique sur le bouton de suppression, alors le com choisi sera supprimé dans la BDD
  $DAO->supprimerCom($_POST['supprimer']);
}

$commentaires=$DAO->getAllComsByArticle($_POST['comsAConsulter']); // On consulte tous les articles
$article=$DAO->getArticleById($_POST['comsAConsulter']); // On récupère un article d'id donné
include '../view/gestionComs.view.php';

?>
