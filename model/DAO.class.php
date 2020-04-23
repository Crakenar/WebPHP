<?php

class DAO {
  private $db;
  function __construct(){
    $this->db = new PDO('sqlite:../BDD/projet.db');
  }

  function getAllUtilisateurs(): Array { // Fonction qui récupère et retourne une liste des logins de tous les utilisateurs.
    $m="SELECT login FROM User ;";
    $sth=$this->db->query($m);
    $resultat=$sth->fetchAll(PDO::FETCH_CLASS,"Utilisateur");
    return $resultat;
  }

  function getUtilisateurByLogin(string $id):Utilisateur{ // Fonction qui retourne un utilisateur à partir de son login.
    $m="SELECT * FROM User WHERE login='$id';";
    $sth=$this->db->query($m);
    $resultat=$sth->fetchAll(PDO::FETCH_CLASS,"Utilisateur");
    return $resultat[0];
  }

  function getUtilisateurById(int $id):Utilisateur{ // Fonction qui retourne un utilisateur à partir de son numéro d'utilisateur.
    $m="SELECT * FROM User WHERE numUtilisateur='$id';";
    $sth=$this->db->query($m);
    $resultat=$sth->fetchAll(PDO::FETCH_CLASS,"Utilisateur");
    return $resultat[0];
  }


  /////////////////////////////////////////////////////////////////////
  //Fonction donnant lieu a une requete dans la BD en fonction de certain criteres (noms,prenoms...)
  //Afin de pouvoir mettre en place l'affichage des adherents en fonction de ces meme criteres.
  //Pages concernees : Adherent.class.php, Utilisateur.class.php,  adherents.view.php, gestionAdherents.ctrl.php
  /////////////////////////////////////////////////////////////////////
  function getAdherentOrderByName(string $nom = 'null'):array{ // Fonction qui récupère et retourne une liste d'un ou plusieurs adhérents à partir de leur nom. Par défaut, il n'y a pas de noms, afin de pouvoir récupérer tous les adhérents.
    if($nom == 'null'){
      //Requete sur la base de donnees afin de recuperer les infos personnelles des adherents et les trier.
      $requete = "SELECT * FROM informationsPersonnelles ORDER BY nom"; // S'il n'y a pas de nom, la variable requete récupère tous les adhérents de la base de données en les triant par nom, par ordre alphabétique.
    }else{
      $requete = "SELECT * FROM informationsPersonnelles where nom = $nom"; // S'il y a un nom, la variable requete récupère tous les ashérents qui ont pour nom le nom entré en paramètre.
    }
    //Retourne un (statement) Objet
    $sth = $this->db->query($requete);
    //Retourne une array de lignes
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
  }

  function getAdherentByNum(int $num = 0):array{ // Fonction qui récupère et retourne une liste d'un ou plusieurs adhérents à partir du numéro d'adhérent. Par défaut, celui-ci est initialisé à  afin de pouvoir récupérer tous les adhérents.
    if($num == 0){
      $requete = "SELECT * FROM informationsPersonnelles ORDER BY numAdh"; // S'il n'y a pas de numéro d'adhérent, la requete retourne l'ensemble des ahérents de la base de données en les triant par numéro d'adhérent, par ordre croissant.
    }else{
      $requete = "SELECT * FROM informationsPersonnelles where numAdh = $num"; // S'il y a un numéro d'adhérent, la requete retourne l'adhérent ayant pour numéro d'adhérent celui entré en paramètre.
    }
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
  }

  function getAdherentOrderByPrenom(string $prenom = 'null'):array{ // Fonction qui récupère et retourne une liste d'un ou plusieurs adhérents à partir de leur prénom. Par défaut, il n'y a pas de prénoms, afin de pouvoir récupérer tous les adhérents.
    if($prenom == 'null'){
      $requete = "SELECT * FROM informationsPersonnelles ORDER BY prenom"; // S'il n'y a pas de prénom, la variable requete récupère tous les adhérents de la base de données en les triant par prénom, par ordre alphabétique.
    }else{
      $requete = "SELECT * FROM informationsPersonnelles where prenom = $prenom"; // S'il y a un prénom, la variable requete récupère tous les ashérents qui ont pour prénom le prénom entré en paramètre.
    }
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
  }

  function getAdherentOrderBydateNaissance(string $dateNaissance = 'null'):array{ // Même principe que la fonction getAdherentByPrenom.
    if($dateNaissance == 'null'){
      $requete = "SELECT * FROM informationsPersonnelles ORDER BY dateNaissance";
    }else{
      $requete = "SELECT * FROM informationsPersonnelles where dateNaissance = $dateNaissance";
    }
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;

  }

  function getAdherentOrderByPoids(int $poids = 0):array{ // Même principe que la fonction getAdherentByPrenom.
    if($poids == 0){
      $requete = "SELECT * FROM informationsPersonnelles ORDER BY poids";
    }else{
      $requete = "SELECT * FROM informationsPersonnelles where poids = $poids";
    }
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
  }

  function getAdherentOrderByTaille(int $taille = 0):array{ // Même principe que la fonction getAdherentByPrenom.
    if($taille == 0){
      $requete = "SELECT * FROM informationsPersonnelles ORDER BY taille";
    }else{
      $requete = "SELECT * FROM informationsPersonnelles where taille = $taille";
    }
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
  }

  function getAdherentOrderByPaiement():array{ // Fonction qui retourne une liste d'adhérents en fonction de leur paiement. Les adhérents ayant payés seront classés en premier, les autres ensuite.
    $requete = "SELECT * FROM informationsPersonnelles ORDER BY paiement";
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
  }

  function getAdherentOrderByCertificat():array{ // Fonction qui retourne une liste d'adhérents en fonction de leur certificat médical. Les adhérents ayant rendus leur certificat seront classés en premier, les autres ensuite.
    $requete = "SELECT * FROM informationsPersonnelles ORDER BY certifMedical";
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
  }

  /*function getAdherentOrderByAutorisationParentale():array{ // Fonction qui retourne tous les adhérents majeurs.
    $requete = "SELECT * FROM informationsPersonnelles where dateNaissance - datetime('now') >= 18";
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
  }*/

  function getAdherentOrderBySexe():array{ // Même principe que la fonction getAdherentByPrenom.
    $requete = "SELECT * FROM informationsPersonnelles ORDER BY sexe";
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
  }


  /*function getAdherentByTelephone():array{ // Même principe que la fonction getAdherentByPrenom.
    $requete = "SELECT * FROM informationsPersonnelles ORDER BY telephone";
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;
}*/

  function getAdherentByUtilisateur(int $numUtilisateur): Adherent{ // Fonction qui retourne les informations personnelles d'un adhérent caractérisé par un numéro d'utilisateur égal à numUtilisateur.
    $requete="SELECT * FROM informationspersonnelles WHERE numAdh='$numUtilisateur';";
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat[0];

  }

  function getAdherents(): Array{ // Retourne une liste de tous les adhérents inscrits dans la base de données.
    $requete="SELECT * FROM informationspersonnelles;";
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat;

  }
///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
  //Normalement on en a plus besoin car valeur par defaut dans les fonctions du dessus exemple string nom = 'null'
  function getUtilisateurNom(string $nom):Adherent{ // Fonction qui retourne les informations personnelles d'un adhérent caractérisé par un nom égal à nom.
    $requete = "SELECT * FROM informationsPersonnelles where nom='$nom';";
    $sth = $this->db->query($requete);
    $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Adherent");
    return $resultat[0];
  }

  function inscrire(string $nom, string $prenom, string $sexe, string $date_naissance, string $poids, string $taille, string $telephone , string $paiement, string $certificatMedical, string $mail): void { // Fonction qui permet d'inscrire un nouvel adhérent dans la base de données.
    $requete = "SELECT * FROM informationsPersonnelles WHERE numAdh IN (SELECT MAX(numAdh) FROM informationsPersonnelles)"; // On récupère le numéro d'adhérent du dernier adhérent enregistré.
    $rep = $this->db->query($requete);
    $resultat = $rep->fetchAll(PDO::FETCH_CLASS,"Adherent");
    $maxAdh=$resultat[0]; // maxAdh contient les informations du dernier adhérent enregistré.
    $m="INSERT INTO informationsPersonnelles VALUES(:numUtilisateur,:nom,:prenom,:sexe,:dateNaissance,:poids,:taille,:paiement,:certifMedical,:telephone);"; // On importe une nouvelle ligne dans la base de données contenant les informations suivantes.
    $sth=$this->db->prepare($m);
    $sth->execute([
      ':numUtilisateur' => $maxAdh->getNumAdherent()+1, // Le numéro d'adhérent du nouvel adhérent correspond à celui suivant le numéro d'adhérent de maxAdh (actuel dernier adhérent dans la base de données).
      ':nom' => $nom, // On récupère la variable entrée en paramètre.
      ':prenom' => $prenom,
      ':sexe' => $sexe,
      ':dateNaissance' => $date_naissance,
      ':poids' => $poids,
      ':taille' => $taille,
      ':paiement' => $paiement,
      ':certifMedical' => $certificatMedical,
      ':telephone' => $telephone,
    ]);
    $login=$nom.$prenom[0];
    $password=$nom.$prenom;
    $this->inscrireUtilisateur($login,$mail,$password,$maxAdh->getNumAdherent()+1,'adherent');
  }

  function modifierAdherent(string $numAdh,string $nom, string $prenom, string $sexe, string $date_naissance, string $poids, string $taille, string $telephone,string $paiement,string $certificatMedical): void { // Fonction qui permet de modifier les informations d'un adhérent.
    $m="UPDATE informationsPersonnelles SET nom='$nom', prenom='$prenom', sexe='$sexe', dateNaissance='$date_naissance', poids='$poids' ,taille='$taille' ,paiement=$paiement ,certifMedical=$certificatMedical ,telephone='$telephone' WHERE numAdh='$numAdh';";
    $sth=$this->db->prepare($m);
    $sth->execute();
  }

  function supprimerCom(int $id): void { // Fonction qui permet de supprimer un commentaire tout en assurant que les suivants prennent sa place.
    $comASuppr=$this->getComById($id)->getNumCom();
    $m="DELETE FROM Commentaire WHERE numCom='$id';"; // Suppression du commentaire dans la base de données.
    $sth=$this->db->prepare($m);
    $sth->execute();
    $m="UPDATE Commentaire SET numCom=numCom-1 WHERE numCom>$id;"; // Chaque id de commentaire étant suppérieur à celui du commentaire supprimé diminue.
    $sth=$this->db->prepare($m);
    $sth->execute();
  }

  /////////Articles///////////////
  function getAllArticles(): Array { // Récupération de tous les articles.
    $m="SELECT * FROM Article ;";
    $sth=$this->db->query($m);
    $resultat=$sth->fetchAll(PDO::FETCH_CLASS,"Actualite");
    return $resultat;
  }

  function getNbComsByArticle(int $id): int { // Fonction qui retourne le nombre de commentaires sous un article donné.
    $m="SELECT numCom,numUtilisateur,numArticle,numComSuivant,dateCom,contenuCom FROM Commentaire,Article WHERE numArticle=id AND id=$id  ;";
    $sth=$this->db->query($m);
    $resultat=$sth->fetchAll(PDO::FETCH_CLASS,"Commentaire");
    return sizeof($resultat);
  }

  function getAllComsByArticle(int $id): Array { // Fonction qui retourne tous les commentaires sous un article donné.
    $m="SELECT * FROM Commentaire WHERE numArticle='$id' ;";
    $sth=$this->db->query($m);
    $resultat=$sth->fetchAll(PDO::FETCH_CLASS,"Commentaire");
    return $resultat;
  }

  function getArticleById(int $id): Actualite { // Fonction qui retourne un article selon son id.
    $m="SELECT * FROM Article WHERE id='$id';";
    $sth=$this->db->query($m);
    $resultat=$sth->fetchAll(PDO::FETCH_CLASS,"Actualite");
    return $resultat[0];
  }

  function getComById(int $id): Commentaire { // Fonction qui retourne un commentaire selon son id.
    $m="SELECT * FROM Commentaire WHERE numCom='$id';";
    $sth=$this->db->query($m);
    $resultat=$sth->fetchAll(PDO::FETCH_CLASS,"Commentaire");
    return $resultat[0];
  }

function getNumDernierAdherent(): int{ // Fonction qui retourne le numéro d'adhérent du dernier adhérent enregistré dans la base de données.
  $requete = "SELECT * FROM informationsPersonnelles WHERE numAdh IN (SELECT MAX(numAdh) FROM informationsPersonnelles)";
  $rep = $this->db->query($requete);
  $resultat = $rep->fetchAll(PDO::FETCH_CLASS,"Adherent");
  return $resultat[0]->getNumAdherent();
}

function inscrireResponsableLegal(int $numEnfant, string $nom, string $prenom, string $telephone): void { // Fonction qui permet d'inscrire un nouveau responsable légal dans la base de données.
  $requete = "SELECT * FROM informationsResponsableLegal WHERE numRespLegal IN (SELECT MAX(numRespLegal) FROM informationsResponsableLegal)"; // On récupère les informations du dernier responsable légal de la base de données.
  $rep = $this->db->query($requete);
  $resultat = $rep->fetchAll(PDO::FETCH_CLASS,"ResponsableLegal");
  if(isset($resultat[0])){
    $maxRespLeg=$resultat[0]->getNumResponsableLegal(); // S'il y a déjà un responsable légal, on récupère le numéro de celui-ci.
  }else{
    $maxRespLeg=0; // Sinon, on initialise le numéro max à 0.
  }
  $m="INSERT INTO informationsResponsableLegal VALUES(:numRespLegal,:nom,:prenom,:telephone,:numEnfant);"; // On ajoute une nouvelle ligne pour un nouveau responsable légal.
  $sth=$this->db->prepare($m);
  $sth->execute([
    ':numRespLegal' => $maxRespLeg+1, // Le nouveau responsable légal aura pour numéro le numéro suivant celui de l'actuel dernier responsable légal.
    ':nom' => $nom, // Le nom est celui entré en paramètre.
    ':prenom' => $prenom,
    ':telephone' => $telephone,
    ':numEnfant' => $numEnfant,
  ]);
}

function getResponsablesLegauxByEnfant(int $numEnfant): array{  // On récupère le responsable légal d'un enfant en fonction du numéro d'adhérent de celui-ci.
  $requete = "SELECT * FROM informationsResponsableLegal WHERE numEnfant=$numEnfant ;";
  $rep = $this->db->query($requete);
  $resultat = $rep->fetchAll(PDO::FETCH_CLASS,"ResponsableLegal");
  return $resultat;
}

function supprimerAdherent(int $numAdh) : void { // Fonction qui permet de supprimer un adhérent de la base de données.
  if($numAdh!="1"){ // Si l'adhérent à supprimer n'est pas le premier dans la liste.
    $AdherentASuppr = $this->getAdherentByNum($numAdh); // On récupère les informations de l'adhérent ayant pour numéro celui entré en paramètre.
    $requete = "DELETE FROM informationsPersonnelles where numAdh = '$numAdh';"; // On supprime l'adhérent ayant pour nuéro le numéro entr& en paramètre.
    $sth= $this->db->prepare($requete);
    $sth->execute();

    $m = "UPDATE informationsPersonnelles SET numAdh = numAdh-1 WHERE numAdh>$numAdh;"; // Pour chaque responsable légal ayant un numéro supérieur à celui du responsable légal supprimé, on diminue le numéro.
    $sth=$this->db->prepare($m);
    $sth->execute();

    if(isset($this->getAdherents()[$numAdh-1]) && (int)((time()-strtotime($this->getAdherents()[$numAdh-1]->getDateNaissance())/3600/24/365)<18)){
      $respLegaux=$this->getResponsablesLegauxByEnfant($numAdh); // On récupère les responsables légaux s'il y en a.

      $m = "UPDATE informationsPersonnelles SET numAdh = numAdh-1 WHERE numAdh>$numAdh"; // Pour tous les adhérents ayant un numéro supérieur à celui de l'adhérent supprimé, on diminue leur nuéro.
      $sth=$this->db->prepare($m);
      $sth->execute();

      $num1=$respLegaux[0]->getNumResponsableLegal(); // On récupère le responsable légal de l'adhérent supprimé.
      foreach ($respLegaux as $value) {

        $requete = "DELETE FROM informationsResponsableLegal where numRespLegal = $num1;"; // On supprime ce responsable légal.
        $sth= $this->db->prepare($requete);
        $sth->execute();

        $m = "UPDATE informationsResponsableLegal SET numRespLegal = numRespLegal-1 WHERE numRespLegal>$num1;"; // Pour chaque responsable légal ayant un numéro supérieur à celui du responsable légal supprimé, on diminue le numéro.
        $sth=$this->db->prepare($m);
        $sth->execute();
      }
    }
  }
}

function getUtilisateurByAdherent(int $numAdherent): Utilisateur{ // Fonction qui récupère un utilisateur en fonction de son numéro d'adhérent (de la table informationsPersonnelles).
  $requete="SELECT * FROM user WHERE numUtilisateur='$numAdherent';";
  $sth = $this->db->query($requete);
  $resultat = $sth->fetchAll(PDO::FETCH_CLASS,"Utilisateur");
  return $resultat[0];
}

function modifierResponsableLegal(string $numResp,string $nom, string $prenom, string $telephone): void {  // Fonction qui permet de modifier les informations d'un responsable légal.
  $m="UPDATE informationsResponsableLegal SET nom='$nom', prenom='$prenom',telephone='$telephone' WHERE numRespLegal='$numResp';";
  $sth=$this->db->prepare($m);
  $sth->execute();
}

function inscrireUtilisateur(string $login, string $password, string $mail, int $numAdh, string $role): void { // Fonction qui permet d'enregistrer un nouvel utilisateur dans la base de données.
  $requete = "SELECT * FROM User WHERE numUtilisateur IN (SELECT MAX(numUtilisateur) FROM User)"; // On récupère les informations du dernier utilisateur enregistré dans la base.
  $rep = $this->db->query($requete);
  $resultat = $rep->fetchAll(PDO::FETCH_CLASS,"Utilisateur");
  if(isset($resultat[0])){
    $maxUser=$resultat[0]->getNumUtilisateur(); // S'il existe au moins un utilisateur dans la base de données, on prend le numéro d'utilisateur du dernier.
  }else{
    $maxUser=0; // Sinon, on initialise maxUser à 0.
  }
  $m="INSERT INTO User VALUES(:numUtilisateur,:login,:mail,:password,:numAdh,:role);"; // On insère le nouvel utilisateur avec les valeurs suivantes.
  $sth=$this->db->prepare($m);
  $sth->execute([
    ':numUtilisateur' => $maxUser+1, // Le nouvel utilisateur a pour numéro le numéro du dernier utilisateur+1.
    ':login' => $login, // On entre comme valeur dans la base de données la valeur donnée en paramètre.
    ':mail' => $mail,
    ':password' => $password,
    ':numAdh' => $numAdh,
    ':role' => $role,
  ]);
}

function supprimerArticle(int $numAct) : void { // Fonction qui permet de supprimer un adhérent de la base de données.
    $comASuppr=$this->getAllComsByArticle($numAct);
    foreach ($comASuppr as $value) {
      $numCom=$value->getNumCom();
      $requete = "DELETE FROM Commentaire where numArticle = '$numAct';"; // On supprime l'adhérent ayant pour nuéro le numéro entr& en paramètre.
      $sth= $this->db->prepare($requete);
      $sth->execute();

      $m = "UPDATE Commentaire SET numCom = numCom-1 WHERE numCom>$numCom;"; // Pour chaque responsable légal ayant un numéro supérieur à celui du responsable légal supprimé, on diminue le numéro.
      $sth=$this->db->prepare($m);
      $sth->execute();
    }

    $requete = "DELETE FROM Article where id = '$numAct';"; // On supprime l'adhérent ayant pour nuéro le numéro entr& en paramètre.
    $sth= $this->db->prepare($requete);
    $sth->execute();

    $m = "UPDATE Article SET id = id-1 WHERE id>$numAct;"; // Pour chaque responsable légal ayant un numéro supérieur à celui du responsable légal supprimé, on diminue le numéro.
    $sth=$this->db->prepare($m);
    $sth->execute();

    $m = "UPDATE Commentaire SET numArticle = numArticle-1 WHERE numArticle>$numAct;"; // Pour chaque responsable légal ayant un numéro supérieur à celui du responsable légal supprimé, on diminue le numéro.
    $sth=$this->db->prepare($m);
    $sth->execute();
}

function modifierArticle(int $numAct,string $titre,string $contenu, string $media): void { // Fonction qui permet de modifier les informations d'un adhérent.
  $date=date("Y-m-d");
  $m="UPDATE Article SET titre='$titre', contenu='$contenu', date_time_edition='$date', mediaArticle='$media' WHERE id=$numAct;";
  $sth=$this->db->prepare($m);
  $sth->execute();
}

function creerArticle(string $titre, string $contenu, string $media): void { // Fonction qui permet d'enregistrer un nouvel article dans la base de données.
  $requete = "SELECT * FROM Article WHERE id IN (SELECT MAX(id) FROM Article)"; // On récupère les informations du dernier utilisateur enregistré dans la base.
  $rep = $this->db->query($requete);
  $resultat = $rep->fetchAll(PDO::FETCH_CLASS,"Actualite");
  if(isset($resultat[0])){
    $maxActu=$resultat[0]->getId(); // S'il existe au moins un utilisateur dans la base de données, on prend le numéro d'utilisateur du dernier.
  }else{
    $maxActu=0; // Sinon, on initialise maxUser à 0.
  }
  $m="INSERT INTO Article VALUES(:id,:titre,:date_e,:contenu,:media);"; // On insère le nouvel utilisateur avec les valeurs suivantes.
  $sth=$this->db->prepare($m);
  $sth->execute([
    ':id' => $maxActu+1, // Le nouvel utilisateur a pour numéro le numéro du dernier utilisateur+1.
    ':titre' => $titre, // On entre comme valeur dans la base de données la valeur donnée en paramètre.
    ':date_e' => date("Y-m-d"),
    ':contenu' => $contenu,
    ':media' => $media,
  ]);
}

function fusionnerComptes(int $num1, int $num2,string $login, string $password, string $mail, string $role): void { // Fonction qui permet de modifier les informations d'un adhérent.
  $numCompte1=$this->getUtilisateurById($num1)->getNumAdherent();
  $numCompte2=$this->getUtilisateurById($num2)->getNumAdherent();
  if($numCompte1==0){
    $numAdherent=$numCompte2;
  }else{
    $numAdherent=$numCompte1;
  }
  $requete = "DELETE FROM Utilisateur where numUtilisateur = '$num1' OR numUtilisateur = '$num2';"; // On supprime l'adhérent ayant pour nuéro le numéro entr& en paramètre.
  $sth= $this->db->prepare($requete);
  $sth->execute();
  inscrireUtilisateur($login,$password,$mail,$numAdherent,$role);

  $numNewUser=$this->getUtilisateurByLogin($login)->getNumUtilisateur();
  $m="UPDATE Commentaires SET numUtilisateur='$numNewUser' WHERE numUtilisateur=$num1 OR numUtilisateur=$num2;";
  $sth=$this->db->prepare($m);
  $sth->execute();
}

}
?>
