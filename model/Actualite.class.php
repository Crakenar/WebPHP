<?php
class Actualite { // Création d'une classe actualité avec pour attributs : id (clé primaire), titre, date de publication, date de la dernière édition, contenu.
  public $id;
  public $titre;
  public $date_time_edition;
  public $contenu;
  public $mediaArticle;

  function getId() : int{ // Retourne l'id de l'actualité courante.
    return $this->id;
  }

  function getTitre() : string{
    return $this->titre;
  }

  function getDateEdit() : string{
    return $this->date_time_edition;
  }

  function getContenu() : string{
    return $this->contenu;
  }

  function getMedia() : string{
    return $this->mediaArticle;
  }
}
?>
