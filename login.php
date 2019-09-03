<?php
session_start();
require 'classes/usuarios.class.php';
$usuarios = new Usuarios();

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));
    $usuarios->setEmail($email);
    $usuarios->setSenha($senha);

    $_SESSION['id'] = $usuarios->existeUsuario();

    header("Location: index.php");
}
require 'pages/header.php';
?>
<div class="d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-header text-center">Faça seu login</div>
        <div class="card-body">
            <form action="login.php" method="post" class="form-column">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control">
                </div>
                <input type="submit" value="Entrar" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<br>
<?php require 'pages/footer.php';?>