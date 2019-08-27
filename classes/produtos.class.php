<?php

class Produtos {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=estoque;host=localhost", "root", "");
    }

    public function createProduto($descricao, $quantidade, $preco) {
        $sql = $this->pdo->prepare("INSERT INTO produtos (descricao, quantidade, preco) VALUES (:descricao, :quantidade, :preco)");
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":preco", $preco);
        $sql->execute();
    }

    public function readProdutos() {
        $sql = $this->pdo->query("SELECT * FROM produtos");
        
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function readProduto($id) {
        $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return array();
        }
    }

    public function updateProduto($id, $descricao, $quantidade, $preco) {
        $sql = $this->pdo->prepare("UPDATE produtos SET descricao = :descricao, quantidade = :quantidade, preco = :preco WHERE id = :id");
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function deleteProduto($id) {
        $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}