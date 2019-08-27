<?php
require 'classes/produtos.class.php';
$produto = new Produtos();
if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
    $quantidade = addslashes($_POST['quantidade']);
    $descricao = addslashes($_POST['descricao']);
    $preco = addslashes($_POST['preco']);
    
    $produto->createProduto($descricao, $quantidade, $preco);
    header("Location: index.php");
}