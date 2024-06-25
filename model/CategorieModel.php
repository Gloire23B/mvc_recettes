<?php

namespace App\Model;

use App\Entity\Categorie;

class CategorieModel extends ModelGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function getAllCategorie() {
        $query = "SELECT * FROM categories";
        $result = $this->executerReq($query);
        $categories = [];
        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $categories[] = new Categorie($row['id'], $row['nom']);
        }
        return $categories;
    }

    public function getCategorieById($id) {
        $query = "SELECT * FROM categories WHERE id = :id";
        $params = ['id' => $id];
        $result = $this->executerReq($query, $params);
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new Categorie($row['id'], $row['nom']);
        }
        return null;
    }

    public function ajouter(Categorie $categorie) {
        $query = "INSERT INTO categories (nom) VALUES (:nom)";
        $params = [
            'nom' => $categorie->getNom()
        ];
        $this->executerReq($query, $params);
    }

    public function update(Categorie $categorie) {
        $query = "UPDATE categories SET nom = :nom WHERE id = :id";
        $params = [
            'nom' => $categorie->getNom(),
            'id' => $categorie->getId()
        ];
        $this->executerReq($query, $params);
    }

    public function delete($id) {
        $query = "DELETE FROM categories WHERE id = :id";
        $params = ['id' => $id];
        $this->executerReq($query, $params);
    }
}

?>
