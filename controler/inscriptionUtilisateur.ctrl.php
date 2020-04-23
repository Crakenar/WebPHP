<?php
require_once('../model/Utilisateur.class.php');
require_once('../model/DAO.class.php');

$DAO = new DAO();
$logins=$DAO->getAllUtilisateurs();

if(isset($_POST['validerInscriptionUtilisateur'])){ // Si l'utilisateur clique sur le bouton "validerInscriptionUtilisateur", alors on vérifie les conditions suivantes.
  if($_POST['mot_de_passe']==$_POST['confirmerMot_de_passe']){ // Si la zone de texte "mot_de_passe" est égale à celle de "confirmer_mot_de_passe", alors l'inscription de l'utilisateur peut être validée.
    $inscription_confirme=2; // Confirmation que l'inscription est valide.
    foreach ($logins as $value) {
      if($value->getLogin()==$_POST["identifiant"]){ // On récupère le login de chaque utilisateur déjà enregistré sur le site internet, si l'un d'entre eux est le même que celui entré, alors la valeur de la variable inscription_confirme est différente.
        $inscription_confirme=1;
      }
    }
    if($inscription_confirme==2){
      $DAO->inscrireUtilisateur($_POST['identifiant'],$_POST['mail'],$_POST['mot_de_passe'],0,'inscrit'); // On ajoute le nouvel utilisateur dans la base de données si l'inscription est possible.
    }
  } else{
    $inscription_confirme=0;
  }
}
if(isset($inscription_confirme) && $inscription_confirme==2){ // Si la confirmation d'inscription a été faite et que le mot de passe correspond à confirmer mot de passe
  $logins=$DAO->getAllUtilisateurs();
  foreach ($logins as $value) { // On parcourt la liste de tous les adhérents
    if($value->getLogin()==$_POST["identifiant"]){
      $utilisateur=$DAO->getUtilisateurByLogin($_POST["identifiant"]); // Si un des utilisateurs possède un login correspondant à l'identifiant entré, on récupère l'adhérent ayant ce login
    }
  }
}
include "../view/inscriptionUtilisateur.view.php";
?>
