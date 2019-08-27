<?php
require_once('classes/produtos.class.php');
$p = new Produtos();
$prod = $p->readProdutos();

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) :
    if (!empty($prod)) :
        ?>
<table class="table table-hover text-center">
    <thead>
        <tr>
            <th>Quantidade</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php
                foreach ($prod as $dados) :
                    ?>
        <tr>
            <td><?= $dados['quantidade'] ?></td>
            <td><?= $dados['descricao'] ?></td>
            <td><?= $dados['preco'] ?></td>
            <td>
                <a href="form-editar.php?id=<?= $dados['id'] ?>" class="btn btn-primary">Editar</a>
                <a href="excluir.php?id=<?= $dados['id'] ?>" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        <?php
                endforeach;
            endif;
        endif;
        ?>
    </tbody>
</table>

</div>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
</body>

</html>