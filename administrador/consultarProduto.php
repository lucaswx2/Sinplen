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
if (isset($_SESSION['nv_acesso']) && $_SESSION['nv_acesso'] > 3) {
    include_once '../conexao.php';
    include_once '../painel/consultaspainel.php';
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
            ?>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading ">
                                <div class="panel-title ">Telefone</div>
                            </div>
                            <div class="panel-body">
                                <table class="table "  >
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th>Descricao</th>
                                            <th >Comandos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        pesquisarProduto(1, $conn);
                                        ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">Internet</div>
                        </div>
                        <div class="panel-body">
                            <table class="table "  >
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Preço</th>
                                        <th>Descricao</th>
                                        <th >Comandos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    pesquisarProduto(2, $conn);
                                    ?>



                                </tbody>
                            </table> 
                        </div>
                    </div>

                </div>

                <div class="row-fluid">
                    <div class="col-sm-12 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title">TV</div>
                            </div>
                            <div class="panel-body">
                                <table class="table "  >
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th>Descricao</th>
                                            <th >Comandos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        pesquisarProduto(3, $conn);
                                        ?>


                                    </tbody>
                                </table> 
                            </div>
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