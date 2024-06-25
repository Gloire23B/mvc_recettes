<?php

namespace App\Controllers;

use App\Model\CategorieModel;
use App\Entity\Categorie;

class CategorieController {

    private $categorieModel;

    public function __construct() {
        $this->categorieModel = new CategorieModel();
    }

    public function categorieHttp() {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case "default":
                    $categories = $this->categorieModel->getAllCategorie();
                    include "views/categorie/accueil.php";
                    break;

                case "categorie":
                    $categories = $this->categorieModel->getAllCategorie();
                    include "views/categorie/index.php";
                    break;

                case "categorieAdd":
                    if (isset($_POST['nom'])) {
                        $nom = $_POST['nom'];
                        $categorie = new Categorie(0, $nom);
                        $this->categorieModel->ajouter($categorie);
                        header("location: ?action=categorie");
                        exit;
                    }
                    include "views/categorie/new.php";
                    break;

                case "updateCategorie":
                    if (isset($_POST['id']) && isset($_POST['nom'])) {
                        $id = $_POST['id'];
                        $nom = $_POST['nom'];
                        $categorie = new Categorie($id, $nom);
                        $this->categorieModel->update($categorie);
                        header("location: ?action=categorie");
                        exit;
                    } elseif (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $categorie = $this->categorieModel->getCategorieById($id);
                        include "views/categorie/edit.php";
                    }
                    break;

                case "deleteCategorie":
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $this->categorieModel->delete($id);
                        header("location: ?action=categorie");
                        exit;
                    }
                    break;
            }
        } else {
            $categories = $this->categorieModel->getAllCategorie();
            include "views/categorie/accueil.php";
        }
    }
}

?>
