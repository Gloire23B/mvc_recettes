<?php

namespace App\Entity;

class Recette
{
    private $id;
    private $nom;
    private $photo;
    private $origine;
    private $description;
    private $id_categorie;

    public function __construct($id=0, $nom="", $photo="", $origine="", $description="", $id_categorie="")
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->photo = $photo;
        $this->origine = $origine;
        $this->description = $description;
        $this->id_categorie = $id_categorie;
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

    // Getter and Setter for nom
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    // Getter and Setter for photo
    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    // Getter and Setter for origine
    public function getOrigine()
    {
        return $this->origine;
    }

    public function setOrigine($origine)
    {
        $this->origine = $origine;
    }

    // Getter and Setter for description
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    // Getter and Setter for id_categorie
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }
}

?>
