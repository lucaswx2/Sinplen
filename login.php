<?php
require_once 'funcoes.php';
require_once 'conexao.php';

if (!isset($_SESSION['usr_session']) && !isset($_SESSION['usr_pwd'])) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>SinPlen - Tela de Login</title>
            <link href="estilo/bootstrap.min.css" rel="stylesheet"/>
            <link href="estilo/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>
            <link href="estilo/estiloinicial.css" type="text/css" rel="stylesheet"/>
        </head>
        <body>

            <?php include_once './includes/cabecalho.php'; ?>
            <div class="row">
                <div class="container center-block login">
                    <form class="form-login" method="post" >
                        <legend><h2 class="form-login-cabecalho">Faça seu login</h2></legend>
                        <input type="text" name="login" id="inputLogin" class="form-control" placeholder="Insira seu Login..." required autofocus><br>  
                        <input type="password" name="password" id="inputSenha" class="form-control" placeholder="Insira sua senha..." required><br>
                        <button class="btn btn-primary btn-lg"  type="submit">Login</button>
                        <?php
                        if ((count($_POST) > 0) && (isset($_POST['login']))) {
                            if ($logar = checarLogin($_POST['login'], $_POST['password'], $conn)) {
                                $_SESSION['usr_session'] = $_POST['login'];
                                $_SESSION['pwd_session'] = $_POST['password'];
                                $dadosUsr = consultarUsr($_POST['login'], $conn);
                                foreach ($dadosUsr as $key => $value) {
                                    $_SESSION["$key"] = $value;
                                }
                                echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=./painel/index.php'>";
                            } else {
                                echo '<span class="alert alert-danger" style="color:black;">Usuário ou senha incorreto</span>';
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>

        </body>
    </html>
    <?php
} else {
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=./painel/index.php'>";
}
