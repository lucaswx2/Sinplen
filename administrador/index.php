<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../funcoes.php';
if (isset($_SESSION['nv_acesso']) && checaAcessoAdm($_SESSION['nv_acesso'])) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Tela do Administrador</title>
            <link href="../estilo/bootstrap.min.css" rel="stylesheet"/>
            <link href="../estilo/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>
            <link href="../estilo/estilosistema.css" rel="stylesheet"/>
            

<script type="text/javascript" src="../js/jquery-1.12.2.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="../js/funcao.js"></script>

<script type="text/javascript" src="../js/validacaoJS.js"></script>
        </head>
        <body>
            <?php include_once '../includes/cabecalho_painel.php'; ?>


            <div class="container">

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h2 >Tela do Administrador</h2></div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-3 bg-primary">
                                    <a data-toggle="modal" href="#cadastrarProduto">
                                        <h3> <span class="glyphicon glyphicon-paperclip"></span> Cadastrar Produto</h3>
                                    </a>
                                </div>
                                <div class="col-sm-3 bg-primary">
                                    <a href="../administrador/consultarProduto.php">
                                        <h3> <span class="glyphicon glyphicon-search"></span> Consultar Produto</h3>
                                    </a>
                                </div>
                                <div class="col-sm-3 bg-primary">
                                    <a data-toggle="modal" href="#cadastrarUsuario">
                                        <h3> <span class="glyphicon glyphicon-save-file"></span> Cadastrar Usuario</h3>
                                    </a>
                                </div>
                                <div class="col-sm-3 bg-primary">
                                    <a data-toggle="modal" href="#consultaUsuario">
                                        <h3> <span class="glyphicon glyphicon-search"></span> Consultar Usuario</h3>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <?php include_once './cadastrarProduto.php'; ?>
            <?php include_once './cadastrarUsuario.php'; ?>
            <?php include_once '../administrador/consultaUsr.php'; ?>


        </body>

    </html>

    <?php
} else {
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../painel/index.php'>";
}
?>



