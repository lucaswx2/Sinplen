<?php

include_once '../conexao.php';
include_once './consultaspainel.php';
if (!isset($_SESSION)) {
    session_start();
};
if (isset($_SESSION['nv_acesso']) && $_SESSION['nv_acesso'] > 2) {
    
removerCliente($conn, $_GET['id']);
header('Location: consulta.php?erro=2');
}else{
    echo '<script>alert("Você não tem acesso para excluir o cliente")</script>';
    header('Location: consulta.php?erro=1');
}

            