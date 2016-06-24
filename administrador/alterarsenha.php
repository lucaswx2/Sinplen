<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../funcoes.php';
if (!isset($_SESSION)) {
    session_start();
};
checaSession($_SESSION['usr_session']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sinplen - Gerenciador de Vendas</title>
        <link href="../estilo/bootstrap.min.css" rel="stylesheet"/>
        <link href="../estilo/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>
        <link href="../estilo/estilosistema.css" rel="stylesheet"/>
    </head>
    <body>
        <?php include_once '../includes/cabecalho_painel.php'; ?>
        <div class="container">
            <br>
            <div class="row">
                <div class="panel panel-default" >
                    <div class="panel-heading-style">
                        <h4 class="panel-title">Alterar Senha</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-login" method="post">
                            <h4>Senha Antiga:</h4>
                            <input type="password" name="senhaAntiga" class="form-control pwd_num" maxlength="6" placeholder="Informe sua senha anterior" required>
                            <h4>Nova senha:</h4>
                            <input type="password" name="novaSenha" id="senhaNova" class="form-control pwd_num" maxlength="6" placeholder="Informe sua nova senha"  required>
                            <h4>Repita a nova senha</h4>
                            <input type="password" name="novaSenhaRepete" id="senhaNovaRepete" class="form-control pwd_num" maxlength="6" placeholder="Informe sua nova senha novamente" required>
                            <div class="row">
                                <div class="col-sm-2"><button type="submit" class="btn btn-primary">Alterar</button></div>
                                <div class="col-sm-7">
                                    <span class="alert-danger" id="spanerro" style="color:black;"><?php
                                        if (isset($_POST['senhaAntiga'])) {
                                            $mensagem = alterarSenha($_POST['senhaAntiga'], $_POST['novaSenha'], $_POST['novaSenhaRepete'], $_SESSION['usr_pwd'], $_SESSION['id'], $conn,$_SESSION['usr_session']);
                                            foreach ($mensagem as $value) {
                                                echo $value;
                                            }
                                        }
                                        ?></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery-1.12.2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>   
        <script src="../js/validacaoJS.js" type="text/javascript"></script>

    </body>
</html>
