<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once 'funcoes.php';
require_once 'conexao.php';
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SinPlen - Soluções em TI</title>
        <link href="estilo/bootstrap.css" rel="stylesheet"/>
        <link href="estilo/bootstrap-theme.css" rel="stylesheet" media="screen"/>
        <link href="estilo/estiloinicial.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>    
        <?php include_once './includes/cabecalho.php'; ?>



    </body>
</html>
