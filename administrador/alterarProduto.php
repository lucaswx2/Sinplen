<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (!isset($_SESSION)) {
    session_start();
};
include_once '../funcoes.php';
if (isset($_SESSION['nv_acesso']) && checaAcessoAdm($_SESSION['nv_acesso'])) {
    include_once '../painel/consultaspainel.php';
    include_once '../conexao.php';
    ?>

    <html>
        <head>
            <meta charset="UTF-8">
            <title>Tela do Administrador</title>
            <link href="../estilo/bootstrap.min.css" rel="stylesheet"/>
            <link href="../estilo/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>
            <link href="../estilo/estilosistema.css" rel="stylesheet"/>
        </head>
        <body>
            <?php
            include_once '../includes/cabecalho_painel.php';
            $produto = detalharProduto($_GET['id'], $conn);
            ?>
            <div class="container">
                <div class="row">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                            <h4 class="panel-title">Alterar Produto</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="post">
                                <div class="row">
                                    <input type="text" name="nome_produto" placeholder="Nome do Produto" class="form-control" required maxlength="35" value="<?php echo $produto['nome'] ?>">
                                </div><br><br>
                                <div class="row">
                                    <div class="col-sm-4" style="border:1px groove black">
                                        <fieldset>
                                            <legend>Tipo</legend>
                                            <input type="radio" name="tipo_produto" value="1" <?php
                                            echo ($produto['tipo'] == 1 ? "checked" : "");
                                            ?> >Telefone<br>
                                            <input type="radio"  name="tipo_produto" value="2" <?php
                                            echo ($produto['tipo'] == 2 ? "checked" : "");
                                            ?>>Internet<br>
                                            <input type="radio" name="tipo_produto" value="3" <?php
                                            echo ($produto['tipo'] == 3 ? "checked" : "");
                                            ?>>TV<br>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 col-sm-offset-2">
                                        <b>R$</b>
                                        <input type="text" class="form-control"  id="dinheiro" placeholder="Preço do Produto" name="preco_produto" required maxlength="6" value="<?php echo $produto['preco']; ?>">
                                    </div>
                                </div><br><br>
                                <div class="row">
                                    <input type="text" name="descricao_produto" placeholder="Descrição do Produto" class="form-control" required value="<?php echo $produto['descricao'] ?>">
                                </div>
                                <div class="panel-footer">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary">Alterar Produto</button>
                                        <span class="">
                                            <?php
                                            if (isset($_POST['nome_produto'])) {
                                                alteraProduto($conn, $_POST['nome_produto'], $_POST['tipo_produto'], $_POST['preco_produto'], $_POST['descricao_produto'], $_GET['id']);
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>

    <?php
    
} else {
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../painel/index.php'>";
}
?>