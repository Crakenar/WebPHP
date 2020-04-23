<?php
require_once('../model/Utilisateur.class.php');
require_once('../model/DAO.class.php');

$DAO = new DAO();
$adherent=$DAO->get('star'); // On récupère dans la variable adhérent les informations de l'adhérent de login "star" si celui-ci existe
var_dump($adherent); // On affiche les informations d'adhérent
$password=$adherent->getPassword(); // On récupère le mot de passe de l'adhérent "star"
var_dump($password); // On affiche le mot de passe de l'adhérent
?>
