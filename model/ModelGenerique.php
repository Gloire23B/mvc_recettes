<?php

namespace App\Model;

abstract class ModelGenerique {
    protected $pdo;

    public function __construct() {
        $this->pdo = new \PDO("mysql:host=localhost;dbname=recettes", "root", "", [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]);
    }

    // public function getAll($table) {
    //     $query = "SELECT * FROM " . $table;
    //     $stmt = $this->executerReq($query);
    //     return $stmt->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\\' . ucfirst(rtrim($table, 's')));
    // }

    // public function getOne($table, $id) {
    //     $query = "SELECT * FROM " . $table . " WHERE id = :id";
    //     $stmt = $this->executerReq($query, ["id" => $id]);
    //     $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Entity\\' . ucfirst(rtrim($table, 's')));
    //     return $stmt->fetch();
    // }

    public function executerReq($query, array $params = []) {
        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $params[$key] = htmlentities($value, ENT_QUOTES, 'UTF-8');
        }
        $stmt->execute($params);
        return $stmt;
    }
}
?>
