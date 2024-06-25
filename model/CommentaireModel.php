<?php

namespace App\Model;

use App\Entity\Commentaire;

class CommentaireModel extends ModelGenerique {

    public function ajouterCommentaire(Commentaire $commentaire) {
        $query = 'INSERT INTO commentaires (text, date, id_user, id_recette) VALUES (:text, :date, :id_user, :id_recette)';
        $this->executerReq($query, [
            'text' => $commentaire->getText(),
            'date' => $commentaire->getDate() ?? date('Y-m-d H:i:s'),
            'id_user' => $commentaire->getIdUser(),
            'id_recette' => $commentaire->getIdRecette()
        ]);
    }

    public function obtenirCommentaires() {
        $query = 'SELECT * FROM commentaires';
        $stmt = $this->executerReq($query);
        $commentaires = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $commentaire = new Commentaire($row['id'], $row['text'], $row['date'], $row['id_user'], $row['id_recette']);
            $commentaires[] = $commentaire;
        }
        return $commentaires;
    }

    public function obtenirCommentaireParId($id) {
        $query = 'SELECT * FROM commentaires WHERE id = :id';
        $stmt = $this->executerReq($query, ['id' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new Commentaire($row['id'], $row['text'], $row['date'], $row['id_user'], $row['id_recette']);
        }
        return null;
    }

    public function mettreAJourCommentaire(Commentaire $commentaire) {
        $query = 'UPDATE commentaires SET text = :text, date = :date, id_user = :id_user, id_recette = :id_recette WHERE id = :id';
        $this->executerReq($query, [
            'text' => $commentaire->getText(),
            'date' => $commentaire->getDate() ?? date('Y-m-d H:i:s'),
            'id_user' => $commentaire->getIdUser(),
            'id_recette' => $commentaire->getIdRecette(),
            'id' => $commentaire->getId()
        ]);
    }

    public function supprimerCommentaire($id) {
        $query = 'DELETE FROM commentaires WHERE id = :id';
        $this->executerReq($query, ['id' => $id]);
    }
}

?>
