<?php
class Adherent { // Création d'une classe Adherent avec pour attributs : numAdh (clé primaire) ainsi que les différentes infos personnelles pour chaque adhérent et la vérification sur leur paiement et leur certificat médical
  public $numAdh;
  public $nom;
  public $prenom;
  public $sexe;
  public $dateNaissance;
  public $poids;
  public $taille;
  public $paiement;
  public $certifMedical;
  public $telephone;



  function getNumAdherent() : int{
    return $this->numAdh;
  }

  function getNom() : string{
    return $this->nom;
  }

  function getPrenom() : string{
    return $this->prenom;
  }

  function getDateNaissance() : string{
    return $this->dateNaissance;
  }

  function getPoids() : int{
    return $this->poids;
  }

  function getTaille() : int{
    return $this->taille;
  }

  function getPaiement() : string{
    return $this->paiement;
  }

  function getCertifMedical() : string{
    return $this->certifMedical;
  }

  function getSexe() : string{
    return $this->sexe;
  }

  function getTelephone() : string {
    return $this->telephone;
  }
}
?>
