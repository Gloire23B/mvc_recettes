<?php

namespace App\Model;

use App\Entity\User;

class UserModel extends ModelGenerique {

    public function ajouterUser(User $user) {
        $query = 'INSERT INTO users (nom, prenom, login, password) VALUES (:nom, :prenom, :login, :password)';
        $this->executerReq($query, [
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'login' => $user->getLogin(),
            'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT) // Hashing the password for security
        ]);
    }

    public function obtenirUsers() {
        $query = 'SELECT * FROM users';
        $stmt = $this->executerReq($query);
        $users = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $user = new User($row['id'], $row['nom'], $row['prenom'], $row['login'], $row['password']);
            $users[] = $user;
        }
        return $users;
    }

    public function obtenirUserParId($id) {
        $query = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->executerReq($query, ['id' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new User($row['id'], $row['nom'], $row['prenom'], $row['login'], $row['password']);
        }
        return null;
    }

    public function mettreAJourUser(User $user) {
        $query = 'UPDATE users SET nom = :nom, prenom = :prenom, login = :login, password = :password WHERE id = :id';
        $this->executerReq($query, [
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'login' => $user->getLogin(),
            'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
            'id' => $user->getId()
        ]);
    }

    public function supprimerUser($id) {
        $query = 'DELETE FROM users WHERE id = :id';
        $this->executerReq($query, ['id' => $id]);
    }

    public function connexion($login, $password) {
        $query = 'SELECT * FROM users WHERE login = :login';
        $stmt = $this->executerReq($query, ['login' => $login]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        var_dump($user);

        if ($user != null && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            
            return true;
        } else {
            return false;
        }
    }
    

}


?>
