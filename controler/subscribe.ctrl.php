<?php
require_once('../model/Utilisateur.class.php');
require_once('../model/Adherent.class.php');
require_once('../model/ResponsableLegal.class.php');
require_once('../model/DAO.class.php');
session_start();

$DAO = new DAO();
if(isset($_POST['validerInscription']) && (int)((time()-strtotime($_POST['date_naissance']))/3600/24/365)>=18){ // Si l'utilisateur valide son inscription et qu'il a plus de 18 ans, alors il est ajouté à la base de données.
  $DAO->inscrire($_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['date_naissance'],$_POST['poids'],$_POST['taille'],$_POST['telephone'],$_POST['paiement'],$_POST['certificat_medical'],$_POST['mail']);
}
if(isset($_POST['validerInscriptionMineur'])){ // Si l'utilisateur valide son inscription en tant que mineur, alors il est inscrit puis son/ses responsables légaux le sont à leur tour.
  $DAO->inscrire($_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['date_naissance'],$_POST['poids'],$_POST['taille'],$_POST['telephone'],$_POST['paiement'],$_POST['certificat_medical']);
  $DAO->inscrireResponsableLegal($DAO->getNumDernierAdherent(),$_POST['nomResp1'],$_POST['prenomResp1'],$_POST['telephoneResp1']);
  if($_POST['nomResp2']!='' && $_POST['prenomResp2']!=''){
    if(!isset($_POST['telephoneResp2'])){
      $tel='A remplir'; // Par défaut, si l'utilisateur ne remplit pas la case telephoneResp2, elle sera définie comme "A remplir"
    }else{
      $tel=$_POST['telephoneResp2'];
    }
    $DAO->inscrireResponsableLegal($DAO->getNumDernierAdherent(),$_POST['nomResp2'],$_POST['prenomResp2'],$_POST['telephoneResp2']); // Le(s) nouveau(x) responsable(s) légal(aux) sera(ont) ajouté(s) à la base de données
  }
}
include "../view/subscribe.view.php";
?>
