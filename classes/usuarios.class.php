<?php
class Usuarios
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:dbname=estoque;host=localhost", "root", "");
        } catch (PDOException $e) {
            echo "Falhou: " . $e->getMessage();
        }
    }

    public function existeUsuario($email, $senha)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();

            return $dado['id'];
        } else {
            return false;
        }
    }
}
