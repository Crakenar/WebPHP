<?php
class ResponsableLegal { // Création d'une classe Adherent avec pour attributs : numRespLegal (clé primaire) ainsi les informations nécessaires à l'enregistrement d'un responsable légal et le numéro d'adhérent du mineur à charge de ce responsable légal 
  public $numRespLegal;
  public $nom;
  public $prenom;
  public $telephone;
  public $numEnfant;

  function getNumResponsableLegal() : int{
    return $this->numRespLegal;
  }

  function getNom() : string{
    return $this->nom;
  }

  function getPrenom() : string{
    return $this->prenom;
  }

  function getTelephone() : string {
    return $this->telephone;
  }

  function getNumEnfant() : int{
    return $this->numEnfant;
  }
}
?>
