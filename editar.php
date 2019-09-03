<?php
require 'classes/produtos.class.php';

if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
    $id = addslashes($_POST['id']);
    $quantidade = addslashes($_POST['quantidade']);
    $descricao = addslashes($_POST['descricao']);
    $preco = addslashes($_POST['preco']);

    $p = new Produtos($id);

    $p->setDescricao($descricao);
    $p->setPreco($preco);
    $p->setQuantidade($quantidade);
    $p->updateProduto();

    header("Location: index.php");
}
