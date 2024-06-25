<?php

namespace App\Controllers;

use App\Model\UserModel;
use App\Entity\User;

class UserController {

    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function userHttp() {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'user':
                    $users = $this->userModel->obtenirUsers();
                    include "views/users/index.php";
                    break;

                case 'addUser':
                    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['password'])) {
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $login = $_POST['login'];
                        $password = $_POST['password'];

                        $user = new User(0, $nom, $prenom, $login, $password);
                        $this->userModel->ajouterUser($user);

                        header('Location: ?action=user');
                        exit;
                    }
                    include "views/users/new.php";
                    break;

                case 'updateUser':
                    if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['password'])) {
                        $id = $_POST['id'];
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $login = $_POST['login'];
                        $password = $_POST['password'];

                        $user = new User($id, $nom, $prenom, $login, $password);
                        $this->userModel->mettreAJourUser($user);

                        header('Location: ?action=user');
                        exit;
                    } elseif (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $user = $this->userModel->obtenirUserParId($id);
                        include "views/users/edit.php";
                    }
                    break;

                case 'deleteUser':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $this->userModel->supprimerUser($id);
                        header('Location: ?action=user');
                        exit;
                    }
                    break;

                case 'login':
                    if (isset($_POST['login']) && isset($_POST['password'])) {
                        $login = $_POST['login'];
                        $password = $_POST['password'];

                        if ($this->userModel->connexion($login, $password)) {
                            header('Location: ?action=dashboard');
                            exit;
                        } else {
                            $error = "Login ou mot de passe incorrect.";
                            include "views/login.php";
                        }
                    } else {
                        include "views/login.php";
                    }
                    break;

                case 'logout':
                    session_start();
                    session_destroy();
                    header('Location: index.php');
                    exit;
                    break;

                case 'dashboard':
                    if (!isset($_SESSION['user_id'])) {
                        header('Location: ?action=login');
                        exit;
                    }
                    include "views/dashboard.php";
                    break;


                default:
                    $users = $this->userModel->obtenirUsers();
                    include "views/users/index.php";
                    break;
            }
        }
    }
}

?>
