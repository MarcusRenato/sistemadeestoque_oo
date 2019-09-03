<?php
class Usuarios
{
    private $pdo;
    private $id;
    private $email;
    private $senha;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:dbname=estoque;host=localhost", "root", "");
        } catch (PDOException $e) {
            echo "Falhou: " . $e->getMessage();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($e)
    {
        $this->email = $e;
    }

    public function setSenha($s)
    {
        $this->senha = $s;
    }

    public function existeUsuario()
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $sql->execute(array($this->email, $this->senha));

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();

            return $dado['id'];
        } else {
            return false;
        }
    }
}
