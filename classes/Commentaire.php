<?php

namespace App\Entity;

class Commentaire
{
    private $id;
    private $text;
    private $date;
    private $id_user;
    private $id_recette;

    public function __construct($id, $text, $date, $id_user, $id_recette)
    {
        $this->id = $id;
        $this->text = $text;
        $this->date = $date ?? date('Y-m-d H:i:s');
        $this->id_user = $id_user;
        $this->id_recette = $id_recette;
    }

    // Getter and Setter for id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter and Setter for text
    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    // Getter and Setter for date
    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    // Getter and Setter for id_user
    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    // Getter and Setter for id_recette
    public function getIdRecette()
    {
        return $this->id_recette;
    }

    public function setIdRecette($id_recette)
    {
        $this->id_recette = $id_recette;
    }
}

?>
