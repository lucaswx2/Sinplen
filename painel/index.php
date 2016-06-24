<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (!isset($_SESSION)) {
    if (!isset($_SESSION)) {
        session_start();
    };
}
if (!isset($_SESSION['usr_session']) && !isset($_SESSION['usr_pwd'])) {
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../login.php'>";
} else {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>SinPlen - Gerenciador de Vendas</title>
            <link href="../estilo/bootstrap.min.css" rel="stylesheet"/>
            <link href="../estilo/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>
            <link href="../estilo/estilosistema.css" rel="stylesheet"/>
        </head>
        <body>

            <?php include_once '../includes/cabecalho_painel.php'; ?>
            <div class="container">

                <div class="row">
                    <h1  style="font-size: 100px;text-align: center; color: white;text-shadow:#000 1px -1px 2px, #000 -1px 1px 2px, #000 1px 1px 2px, #000 -1px -1px 2px">Bem Vindo<br><?php echo @$_SESSION['name'] ?></h1>
                    <h1 class="navbar navbar-fixed-bottom" style="color: black;text-align:right;text-shadow:grey 1px -1px 2px, #000 -1px 1px 2px, #000 1px 1px 2px, #000 -1px -1px 2px">Sinplen - Soluções em TI personalizadas</h1>
                </div>
            </div>
        </body>
    </html>

    <?php
}
?>
