<?php

class Produtos
{
    private $pdo;
    private $id;
    private $descricao;
    private $quantidade;
    private $preco;

    public function __construct($id = null)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=estoque;host=localhost", "root", "");
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        
        if (!empty($id)) {
            $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
            $sql->execute(array($this->id));

            if ($sql->rowCount() > 0) {
                $dado = $sql->fetch();

                $this->id = $dado['id'];
                $this->descricao = $dado['descricao'];
                $this->quantidade = $dado['quantidade'];
                $this->preco = $dado['preco'];
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($d)
    {
        $this->descricao = $d;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($q)
    {
        $this->quantidade = $q;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($p)
    {
        $this->preco = $p;
    }

    public function createProduto()
    {
        $sql = $this->pdo->prepare("INSERT INTO produtos (descricao, quantidade, preco) VALUES (?, ?, ?)");
        $sql->execute(array($this->descricao, $this->quantidade, $this->preco));
    }

    public function readProdutos()
    {
        $sql = $this->pdo->query("SELECT * FROM produtos");

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function readProduto()
    {
        $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $sql->execute(array($this->id));

        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return array();
        }
    }

    public function updateProduto()
    {
        $sql = $this->pdo->prepare("UPDATE produtos SET descricao = ?, quantidade = ?, preco = ? WHERE id = ?");
        $sql->execute(array($this->descricao, $this->quantidade, $this->preco, $this->id));
    }

    public function deleteProduto()
    {
        $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id = ?");
        $sql->execute(array($this->id));
    }
}
