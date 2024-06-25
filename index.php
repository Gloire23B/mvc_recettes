<?php
ob_start();
session_start();
include "vendor/autoload.php";


use App\Controllers\CategorieController;
use App\Controllers\RecetteController;
use App\Controllers\UserController;
use App\Controllers\CommentaireController;

$catctl = new CategorieController();
$rectl = new RecetteController();
$usctl = new UserController();
$comctl = new CommentaireController();

$action = isset($_GET['action']) ? $_GET['action'] : 'default';

switch ($action) {
    case 'default':
    case 'categorie':
    case 'categorieAdd':
    case 'updateCategorie':
    case 'deleteCategorie':
        $catctl->categorieHttp();
        break;

    case 'recette':
    case 'accueil':
    case 'recetteAdd':
    case 'updateRecette':
    case 'deleterecette':
        $rectl->recetteHttp();
        break;

    case 'user':
    case 'addUser':
    case 'updateUser':
    case 'deleteUser':
    case 'login':
    case 'logout':
    case 'dashboard':
        $usctl->userHttp();
        break;

    case 'commentaire':
    case 'addCommentaire':
    case 'updateCommentaire':
    case 'deleteCommentaire':
        $comctl->commentaireHttp();
        break;

    default:
        // Action par défaut ou page d'accueil
        echo '<h1 style="text-align:center; color: green">Bienvenue sur Mon Carnet de Recettes!</h1>';
        $catctl->categorieHttp();
        break;
}

ob_end_flush();
?>
