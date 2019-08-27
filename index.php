<?php
session_start();
require 'pages/header.php';
if (isset($_SESSION['id']) && !empty($_SESSION['id'])): ?>
<form action="adiciona.php" method="post">
    <div class="form-row">
        <div class="col">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" required>
        </div>

        <div class="col">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>

        <div class="col">
            <label for="preco">Preço</label>
            <input type="number" name="preco" id="preco" class="form-control" required>
        </div>
    </div>
    <br>
    <div class="form-row justify-content-center">
        <input type="submit" value="Cadastrar" class="btn btn-success">
    </div>
</form>
<br>
<?php
    require 'pages/footer.php';
else:
    header("Location: login.php");
endif;

?>