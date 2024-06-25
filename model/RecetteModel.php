<?php

namespace App\Model;

use App\Entity\Recette;

class RecetteModel extends ModelGenerique {

    public function ajouterRecette(Recette $recette) {
        $info = pathinfo($_FILES['photo']['name']);
        $ext = ["jpg", "jpeg", "png", "gif"];

        if (in_array(strtolower($info['extension']), $ext)) {
            move_uploaded_file($_FILES['photo']['tmp_name'], "img/" . $info['basename']);
            $recette->setPhoto($info['basename']);
        }

        $query = 'INSERT INTO recettes (nom, photo, origine, description, id_categorie) VALUES (:nom, :photo, :origine, :description, :id_categorie)';
        $this->executerReq($query, [
            'nom' => $recette->getNom(),
            'photo' => $recette->getPhoto(),
            'origine' => $recette->getOrigine(),
            'description' => $recette->getDescription(),
            'id_categorie' => $recette->getIdCategorie()
        ]);
    }

    public function obtenirRecettes() {
        $query = 'SELECT * FROM recettes';
        $stmt = $this->executerReq($query);
        $recettes = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $recette = new Recette($row['id'], $row['nom'], $row['photo'], $row['origine'], $row['description'], $row['id_categorie']);
            $recettes[] = $recette;  // Ajoutez la recette au tableau
        }
        // Debugging: Print the retrieved recipes
        // echo '<pre>';
        // print_r($recettes);
        // echo '</pre>';
        return $recettes;
    }

    public function obtenirRecetteParId($id) {
        $query = 'SELECT * FROM recettes WHERE id = :id';
        $stmt = $this->executerReq($query, ['id' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new Recette($row['id'], $row['nom'], $row['photo'], $row['origine'], $row['description'], $row['id_categorie']);
        }
        return null;
    }

    public function mettreAJourRecette(Recette $recette) {
        $info = pathinfo($_FILES['photo']['name']);
        $ext = ["jpg", "jpeg", "png", "gif"];

        if (in_array(strtolower($info['extension']), $ext)) {
            move_uploaded_file($_FILES['photo']['tmp_name'], "img/" . $info['basename']);
            $recette->setPhoto($info['basename']);
        }

        $query = 'UPDATE recettes SET nom = :nom, photo = :photo, origine = :origine, description = :description, id_categorie = :id_categorie WHERE id = :id';
        $this->executerReq($query, [
            'nom' => $recette->getNom(),
            'photo' => $recette->getPhoto(),
            'origine' => $recette->getOrigine(),
            'description' => $recette->getDescription(),
            'id_categorie' => $recette->getIdCategorie(),
            'id' => $recette->getId()
        ]);
    }

    public function supprimerRecette($id) {
        $query = 'DELETE FROM recettes WHERE id = :id';
        $this->executerReq($query, ['id' => $id]);
    }
}

?>
