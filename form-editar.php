<?php
session_start();
require 'classes/produtos.class.php';
$produto = new Produtos();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $info = $produto->readProduto($id);
}
require 'pages/header.php';
?>

<form action="editar.php" method="post">
    <input type="hidden" name="id" value="<?= $info['id'] ?>">
    <div class="form-row">
        <div class="col">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" value="<?= $info['quantidade'] ?>" required>
        </div>

        <div class="col">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="<?= $info['descricao'] ?>" required>
        </div>

        <div class="col">
            <label for="preco">Preço</label>
            <input type="number" name="preco" id="preco" class="form-control" value="<?= $info['preco'] ?>" required>
        </div>
    </div>
    <br>
    <div class="form-row justify-content-center">
        <input type="submit" value="Editar" class="btn btn-primary">
    </div>
</form>
<br>

<?php require 'pages/footer.php'; ?>