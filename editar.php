<?php
require 'classes/produtos.class.php';
$p = new Produtos();

if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
    $id = addslashes($_POST['id']);
    $quantidade = addslashes($_POST['quantidade']);
    $descricao = addslashes($_POST['descricao']);
    $preco = addslashes($_POST['preco']);

    $p->updateProduto($id, $descricao, $quantidade, $preco);

    header("Location: index.php");
}