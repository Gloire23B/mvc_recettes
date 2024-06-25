<?php

namespace App\Controllers;

use App\Model\CommentaireModel;
use App\Model\UserModel;
use App\Model\RecetteModel;
use App\Entity\Commentaire;

class CommentaireController {

    private $commentaireModel;
    private $userModel;
    private $recetteModel;

    public function __construct() {
        $this->commentaireModel = new CommentaireModel();
        $this->userModel = new UserModel();
        $this->recetteModel = new RecetteModel();
    }

    public function commentaireHttp() {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'commentaire':
                    $commentaires = $this->commentaireModel->obtenirCommentaires();
                    include "views/commentaires/index.php";
                    break;

                case 'addCommentaire':
                    if (isset($_POST['text']) && isset($_POST['date']) && isset($_POST['id_user']) && isset($_POST['id_recette'])) {
                        $text = $_POST['text'];
                        $date = $_POST['date'];
                        $id_user = $_POST['id_user'];
                        $id_recette = $_POST['id_recette'];

                        $commentaire = new Commentaire(0, $text, $date, $id_user, $id_recette);
                        $this->commentaireModel->ajouterCommentaire($commentaire);

                        header('Location: ?action=commentaire');
                        exit;
                    }
                    $users = $this->userModel->obtenirUsers();
                    $recettes = $this->recetteModel->obtenirRecettes();
                    include "views/commentaires/new.php";
                    break;

                case 'updateCommentaire':
                    if (isset($_POST['id']) && isset($_POST['text']) && isset($_POST['date']) && isset($_POST['id_user']) && isset($_POST['id_recette'])) {
                        $id = $_POST['id'];
                        $text = $_POST['text'];
                        $date = $_POST['date'];
                        $id_user = $_POST['id_user'];
                        $id_recette = $_POST['id_recette'];

                        $commentaire = new Commentaire($id, $text, $date, $id_user, $id_recette);
                        $this->commentaireModel->mettreAJourCommentaire($commentaire);

                        header('Location: ?action=commentaire');
                        exit;
                    } elseif (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $commentaire = $this->commentaireModel->obtenirCommentaireParId($id);
                        $users = $this->userModel->obtenirUsers();
                        $recettes = $this->recetteModel->obtenirRecettes();
                        include "views/commentaires/edit.php";
                    }
                    break;

                case 'deleteCommentaire':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $this->commentaireModel->supprimerCommentaire($id);
                        header('Location: ?action=commentaire');
                        exit;
                    }
                    break;

                default:
                    $commentaires = $this->commentaireModel->obtenirCommentaires();
                    include "views/commentaires/index.php";
                    break;
            }
        }
    }
}

?>
