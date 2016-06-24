<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'consultaspainel.php';
include '../conexao.php';
if (!isset($_SESSION)) {
    session_start();
};
if (!isset($_SESSION['usr_session']) && !isset($_SESSION['usr_pwd'])) {
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../login.php'>";
} else {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>SinPlen - Gerenciador de Vendas</title>
            <link href="../estilo/bootstrap.min.css" rel="stylesheet"/>

            <link href="../estilo/estilosistema.css" rel="stylesheet"/>


        </head>
        <body>

            <?php
            if (@$_GET['erro'] == 1) {
                echo '<script>alert("Você não tem acesso para Excluir o cliente")</script>';
            }
            if (@$_GET['erro'] == 2) {
                echo '<script>alert("Cliente excluido com sucesso")</script>';
            }
            include_once '../includes/cabecalho_painel.php';
            ?>

            <div class="container">
                <div class="row" style="border: 2px double grey;background-color: #fcf8ff"> 

                    <form class="form-horizontal " method="get">
                        <h4 class="col-sm-1 ">Pesquise:</h4>
                        <div class="col-sm-5 ">
                            <input class="form-control" type="text" placeholder="Informe o nome" name="nomePesquisa">
                        </div>         
                        <div class="col-sm-4">
                            <button class="btn btn-alert" type="submit">Pesquisar</button>
                        </div>
                    </form>
                </div>

                <div >

                    <table class="table table-hover table-responsive " id="consulta" >
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Cidade/UF</th>
                                <th >Comandos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['nomePesquisa'])) {
                                pesquisarClienteNome($_GET['nomePesquisa'], $conn);
                            }
                            ?>



                        </tbody>
                    </table> 
                </div>

            </div>
        </body>
    </html>


    <?php
}?>