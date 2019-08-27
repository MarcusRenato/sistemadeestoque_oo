<?php
require 'classes/produtos.class.php';
$produto = new Produtos();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);

    $produto->deleteProduto($id);
    header("Location: index.php");
}