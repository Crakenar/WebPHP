
<?php


require_once('../model/Utilisateur.class.php');
require_once('../model/Adherent.class.php');
require_once('../model/ResponsableLegal.class.php');
require_once('../model/DAO.class.php');
session_start(); // Démarre une nouvelle connexion.
$dao = new DAO();

$utilisateur=$dao->getAdherents(); // La variable utilisateur récupère tous les adhérents inscrits dans la base de données.
$nbSupp=0;
foreach ($utilisateur as $value) { // On parcourt la liste des adhérents.
  $num=$value->getNumAdherent(); // On récupère le numéro d'adhérent de l'adhérent courant.
  if(isset($_POST[$num]) && $_POST[$num]=="on"){ // Si le bouton radio a été sélectionné
    $dao->supprimerAdherent($num-$nbSupp); // Comme le numAdh se met à jour, on supprimme l'adhérent ayant pour numAdh celui entré dans la variable utilisateur, auquel on soustrait le nombre d'adhérents déjà supprimés
    $nbSupp++;
  }
}

if(isset($_POST['validerAdherentAModifier'])){ // Si l'utilisateur valide le choix de l'adhérent qu'il veut modifier, alors on retourne les informations de l'adhérent choisi
  $adherentAModifier=$dao->getAdherentByNum($_POST['adherentAModifier']);
}

if(isset($_POST['validerAdherentAConsulter'])){ // Si l'utilisateur valide le choix de l'adhérent qu'il veut consulter
  $adherentAConsulter=$dao->getAdherentByNum($_POST['adherentAConsulter']); // On récupère les infos de l'adhérent sélectionné
  $utilisateurAConsulter=$dao->getUtilisateurByAdherent($adherentAConsulter[0]->getNumAdherent()); // On récupère les informations de l'utilisateur ayant le même numéro que l'adhérent à consulter
  $age= (int)((time()-strtotime($adherentAConsulter[0]->getDateNaissance()))/3600/24/365); // On récupère l'âge (dâte courante-date de naissance)
  if($age<18){
    $responsablesLegauxAConsulter=$dao->getResponsablesLegauxByEnfant($adherentAConsulter[0]->getNumAdherent()); // Si l'adhérent est mineur, on récupère les infos de ses responsables légaux
    $nbRespLeg=$responsablesLegauxAConsulter[0]->getNumResponsableLegal(); // On récupère le nombre de responsables légaux
  }
}

if(isset($_POST['modifierRespLegaux'])){ // Si l'utilisateur décide de modifier les responsables légaux
  $adherentAConsulterModifRespLeg=$dao->getAdherentByNum($_POST['adherentAConsulterModifRespLeg']);
  $responsablesLegauxAConsulter=$dao->getResponsablesLegauxByEnfant($adherentAConsulterModifRespLeg[0]->getNumAdherent());
}

if(isset($_POST['validerModification'])){ // Si l'utilisateur décide de valider une modification , alors la BDD se modifie selon les nouveaux attributs
  $dao->modifierAdherent($_POST['numAdh'],$_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['date_naissance'],$_POST['poids'],$_POST['taille'],$_POST['telephone'],$_POST['paiement'],$_POST['certificatMedical']);
}

if(isset($_POST['validerModificationRespLeg'])){ // Si l'utilisateur décide de valider un modification sur un responsable légal, alors la BDD se modifie selon les nouveaux attributs
  $dao->modifierResponsableLegal($_POST['numResp1'],$_POST['nomResp1'],$_POST['prenomResp1'],$_POST['telephoneResp1']);
  $dao->modifierResponsableLegal($_POST['numResp2'],$_POST['nomResp2'],$_POST['prenomResp2'],$_POST['telephoneResp2']);
}

if(isset($_POST['prenom'])){ // Dans le tableau regroupant tous les adhérents, si l'on clique sur la colonne "prénom", les adhérents seront triés par ordre alphabétique selon leur prénom.
    $utilisateur = $dao->getAdherentOrderByPrenom();
}else if(isset($_POST['sexe'])){ // Si l'on clique sur la colonne "sexe", les adhérents seront regroupés selon leur sexe (homme/femme).
    $utilisateur = $dao->getAdherentOrderBySexe();
}else if(isset($_POST['dateNaissance'])){ // Si l'on clique sur la colonne "date de naissance", les adhérents seront triés par ordre croissant selon leur date de naissance.
    $utilisateur = $dao->getAdherentOrderBydateNaissance();
}else if(isset($_POST['poids'])){ // Si l'on clique sur la colonne "poids", les adhérents seront triés par ordre croissant selon leur poids.
    $utilisateur = $dao->getAdherentOrderByPoids();
}else if(isset($_POST['taille'])){ // Si l'on clique sur la colonne "taille", les adhérents seront triés par ordre croissant selon leur taille.
    $utilisateur = $dao->getAdherentOrderByTaille();
}else if(isset($_POST['paiement'])){  // Si l'on clique sur la colonne "paiement", les adhérents seront regroupés selon la validité de leur paiement (oui/non).
    $utilisateur = $dao->getAdherentOrderByPaiement();
}else if(isset($_POST['certificatMedical'])){ // Si l'on clique sur la colonne "certificat médical", les adhérents seront regroupés selon la validité du rendu leur certificat médical (oui/non).
    $utilisateur = $dao->getAdherentOrderByCertificat();
}else{
  $utilisateur = $dao->getAdherentOrderByName(); // Par défaut, le tableau sera trié par ordre croissant selon le nom des adhérents.
}


include '../view/gestionAdherents.view.php';



?>
