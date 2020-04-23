<?php
require_once('../model/Utilisateur.class.php');
require_once('../model/DAO.class.php');
require_once('../model/Adherent.class.php');
require_once('../model/ResponsableLegal.class.php');

session_start(); // L'utilisateur est connecté.
if(isset($_POST['deconnect'])){
  if($_POST['deconnect']=='Déconnexion'){
    session_unset(); // Si l'utilisateur clique sur le bouton deconnexion, la session se ferme.
  }
}

$DAO = new DAO();

$logins=$DAO->getAllUtilisateurs(); // On récupère la liste de tous les utilisateurs.
if(!isset($_POST['identifiant'])){ // Si l'utilisateur n'a pas entré d'identifiant, alors mdp = 0.
  $mdp=0; // La valeur mdp sert à définir le message retourné.
}else{
  foreach ($logins as $value) { // On parcourt la liste de tous les adhérents.
    if($value->getLogin()==$_POST['identifiant']){ // Si le login d'un utilisateur enregistré dans la BDD correspond à ce qui a été entré, alors on récupère les informations de cet utilisateur.
      $utilisateur=$DAO->getUtilisateurByLogin($_POST['identifiant']);
    }
  }
  if(!isset($utilisateur)){
    $mdp=-1;
  } else{
    if($_POST['mot_de_passe']==$utilisateur->getPassword()){ // Si le mot de passe entré correspond au mot de passe de l'utilisateur trouvé précédemment, alors les informations de la session correspondent aux informations entrées.
      $_SESSION["identifiant"]=$_POST['identifiant'];
      $_SESSION["mot_de_passe"]=$_POST['mot_de_passe'];
      $mdp=1;
    } else{
      $mdp=-2;
    }
  }
}

if(isset($_Post["validerFusion"])){
  foreach ($logins as $value) { // On parcourt la liste de tous les adhérents.
    if($value->getLogin()==$_POST['identifiant1']){ // Si le login d'un utilisateur enregistré dans la BDD correspond à ce qui a été entré, alors on récupère les informations de cet utilisateur.
      $utilisateur1=$DAO->getUtilisateurByLogin($_POST['identifiant1']);
    }
    if($value->getLogin()==$_POST['identifiant2']){ // Si le login d'un utilisateur enregistré dans la BDD correspond à ce qui a été entré, alors on récupère les informations de cet utilisateur.
      $utilisateur2=$DAO->getUtilisateurByLogin($_POST['identifiant2']);
    }
  }
  $role1=$utilisateur1->getRole();
  $role2=$utilisateur2->getRole();
  if(($role1="adherent" || $role1="moderateur" || $role1="admin")&& $role2="inscrit"){
  $role=$role1;
}else if(($role2="adherent" || $role2="moderateur" || $role2="admin")&& $role1="inscrit"){
  $role=$role2;
}
$DAO->fusionnerComptes($utilisateur1->getNumUtilisateur(),$utilisateur2->getNumUtilisateur(),$utilisateur1->getLogin(),$utilisateur1->getPassword(),$utilisateur1->getMail(),$role);
$_SESSION["identifiant"]=$utilisateur1->getLogin();
$_SESSION["mot_de_passe"]=$utilisateur1->getPassword();
}

if(isset($_SESSION["identifiant"])){
  $mdp=1;
  foreach ($logins as $value) {
    if($value->getLogin()==$_SESSION["identifiant"]){
      $utilisateur=$DAO->getUtilisateurByLogin($_SESSION["identifiant"]);
    }
  }if(isset($utilisateur)){
    if ($utilisateur->getRole()!='inscrit') { // Si l'utilisateur n'a pas le rôle inscrit, alors on récupère ses informations d'adhérent.
      $adherent=$DAO->getAdherentByUtilisateur($utilisateur->getNumAdh());
      $age= (int)((time()-strtotime($adherent->getDateNaissance()))/3600/24/365);
      if($age<18){ // Si l'adhérent a moins de 18 ans, on récupère les informations de son/ses responsables légaux.
        $nbRespLeg=1;
        $responsablesLegaux=$DAO->getResponsablesLegauxByEnfant($adherent->getNumAdherent());
      }

    }
  }
}
include "../view/monCompte.view.php";
?>
