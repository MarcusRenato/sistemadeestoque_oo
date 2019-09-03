<?php
require 'classes/produtos.class.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);

    $produto = new Produtos($id);
    $produto->deleteProduto();
    header("Location: index.php");
}
