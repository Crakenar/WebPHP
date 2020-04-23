<?php
require_once('../model/Utilisateur.class.php');
require_once('../model/DAO.class.php');


$DAO = new DAO();

if(!isset($_SESSION['identifiant'])){ // Vérifie que l'utilisateur soit connecté ou non au site internet.
  $connexion=0;
}else {
  switch ($DAO->getUtilisateurByLogin($_SESSION['identifiant'])->getRole()){ // Si l'utilisateur est connecté, vérifie le rôle de celui-ci afin de lui donner accès aux bonnes pages.
    case 'admin':
    $connexion=4; // La variable connexion définit l'accès de l'utilisateur aux différentes pages.
    break;
    case 'moderateur':
    $connexion=3;
    break;
    case 'adherent':
    $connexion=2;
    break;
    default:
    $connexion=1;
    break;
  }
}

include '../view/header.view.php' ?>
