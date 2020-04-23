<?php
class Utilisateur { // Création d'une classe Adherent avec pour attributs : numUtilisateur (clé primaire) ainsi que les informations servant à se connecter sur le site internet. Le rôle permet quant à lui de définir les droits de l'utilisateur.
  public $numUtilisateur;
  public $login;
  public $password;
  public $mail;
  public $numAdh;
  public $role;


  function getNumUtilisateur() : int{
    return $this->numUtilisateur;
  }

  function getLogin() : string{
    return $this->login;
  }

  function getPassword() : string{
    return $this->password;
  }

  function getMail() : string{
    return $this->mail;
  }

  function getNumAdh() : int{
    return $this->numAdh;
  }

  function getRole() : string{
    return $this->role;
  }
}

?>
