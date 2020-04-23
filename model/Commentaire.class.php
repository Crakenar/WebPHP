<?php
class Commentaire { // Création d'une classe commentaire qui a pour attributs
  public $numCom; // clé primaire de la classe
  public $numUtilisateur; // Utilisateur ayant écrit le commentaire
  public $numArticle; // Article pour lequel ce commentaire répond
  public $numComSuivant; // numCom du commentaire en réponse si celui-ci existe
  public $dateCom; // Date à laquelle ce commentaire a été écrit
  public $contenuCom; // Contenu du commentaire

  function getNumAdh() : int{
    return $this->numUtilisateur;
  }

  function getNumCom() : int{
    return $this->numCom;
  }

  function getNumComSuivant() : int{
    return $this->numComSuivant;
  }

  function getNumArticle() : string{
    return $this->numArticle;
  }

  function getDateCom() : string{
    return $this->dateCom;
  }

  function getContenuCom() : string{
    return $this->contenuCom;
  }
}
?>
