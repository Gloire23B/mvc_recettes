<?php

namespace App\Controllers;

use App\Model\RecetteModel;
use App\Model\CategorieModel;
use App\Entity\Recette;

class RecetteController {

    private $recetteModel;
    private $categorieModel;

    public function __construct() {
        $this->recetteModel = new RecetteModel();
        $this->categorieModel = new CategorieModel();
    }

    public function recetteHttp() {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'recette':
                    $recettes = $this->recetteModel->obtenirRecettes();
                    // Debugging: Print the retrieved recipes
                    //echo '<pre>';
                    // print_r($recettes);
                    //echo '</pre>';
                    include "views/recettes/index.php";
                    break;

                case 'accueil':
                    $recettes = $this->recetteModel->obtenirRecettes();
                    include "views/recettes/accueil.php";
                    break;

                case 'recetteAdd':
                    if (isset($_POST['nom']) && isset($_FILES['photo'])) {
                        $nom = $_POST['nom'];
                        $photo = $_FILES['photo'];
                        $origine = $_POST['origine'];
                        $description = $_POST['description'];
                        $id_categorie = $_POST['id_categorie'];

                        $recette = new Recette(0, $nom, $photo, $origine, $description, $id_categorie);
                        $this->recetteModel->ajouterRecette($recette);

                        header('Location: ?action=recette');
                        exit;
                    }
                    // include "views/recettes/new.php";
                    // break;
                    $categories = $this->categorieModel->getAllCategorie();
                    include "views/recettes/new.php";
                    break;

                case 'updateRecette':
                    if (isset($_POST['id']) && isset($_FILES['photo'])) {
                        $id = $_POST['id'];
                        $nom = $_POST['nom'];
                        $photo = $_FILES['photo'];
                        $origine = $_POST['origine'];
                        $description = $_POST['description'];
                        $id_categorie = $_POST['id_categorie'];

                        $recette = new Recette($id, $nom, $photo, $origine, $description, $id_categorie);
                        $this->recetteModel->mettreAJourRecette($recette);

                        header('Location: ?action=recette');
                        exit;
                    } elseif (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $recette = $this->recetteModel->obtenirRecetteParId($id);
                        $categories = $this->categorieModel->getAllCategorie();
                        include "views/recettes/edit.php";
                    }
                    break;

                case 'deleterecette':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $this->recetteModel->supprimerRecette($id);
                        header('Location: ?action=recette');
                        exit;
                    }
                    break;

                default:
                    $recettes = $this->recetteModel->obtenirRecettes();
                    include "views/recettes/index.php";
                    break;
            }
        }
    }
}

?>
