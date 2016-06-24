<?php

include '../conexao.php';
include '../funcoes.php';

$dadosCliente = array();
$tem_erro = false;
$campoErrado = array();


if (count($_POST) > 0) {

    if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
        $dadosCliente['nome'] = $_POST['nome'];
    } else {
        $tem_erro = true;
        $campoErrado['nome'] = $_POST['nome'];
    }

    if (isset($_POST['cpf']) && strlen($_POST['cpf'])) {
        $dadosCliente['cpf'] = $_POST['cpf'];
    } else {
        $tem_erro = true;
        $campoErrado['cpf'] = 'O campo CPF está invalido ou já existe na base de dados';
    }

    if (isset($_POST['rg']) && strlen($_POST['rg']) > 0) {
        $dadosCliente['rg'] = $_POST['rg'];
    } else {
        $tem_erro = true;
        $campoErrado['rg'] = $_POST['rg'];
    }

    if (isset($_POST['data_nsc']) && strlen($_POST['data_nsc']) > 0) {
        $dadosCliente['data_nsc'] = $_POST['data_nsc'];
    } else {
        $tem_erro = true;
        $campoErrado['data_nsc'] = $_POST['data_nsc'];
    }

    if (isset($_POST['endereco']) && strlen($_POST['endereco']) > 0) {
        $dadosCliente['endereco'] = $_POST['endereco'];
    } else {
        $tem_erro = true;
        $campoErrado['endereco'] = $_POST['endereco'];
    }
    if (isset($_POST['cidades']) && strlen($_POST['cidades']) > 0) {
        $dadosCliente['cidades'] = $_POST['cidades'];
    } else {
        $tem_erro = true;
        $campoErrado['cidades'] = $_POST['cidades'];
    }
    if (isset($_POST['estados']) && strlen($_POST['estados']) > 0) {
        $dadosCliente['estados'] = estadoNomeParaId($conn, $_POST['estados']);
    } else {
        $tem_erro = true;
        $campoErrado['estados'] = $_POST['estados'];
    }

    if (isset($_POST['bairro']) && strlen($_POST['bairro']) > 0) {
        $dadosCliente['bairro'] = $_POST['bairro'];
    } else {
        $tem_erro = true;
        $campoErrado['bairro'] = $_POST['bairro'];
    }


    if (isset($_POST['cep']) && strlen($_POST['cep']) > 0) {
        $dadosCliente['cep'] = $_POST['cep'];
    } else {
        $tem_erro = true;
        $campoErrado['cep'] = $_POST['cep'];
    }

    if (isset($_POST['telefone1']) && strlen($_POST['telefone1']) > 0) {
        $dadosCliente['telefone1'] = $_POST['telefone1'];
    } else {
        $tem_erro = true;
        $campoErrado['telefone1'] = $_POST['telefone1'];
    }

    if (isset($_POST['telefone2']) && strlen($_POST['telefone2']) > 0) {
        $dadosCliente['telefone2'] = $_POST['telefone2'];
    } else {
        $tem_erro = true;
        $campoErrado['telefone2'] = $_POST['telefone2'];
    }

    if (isset($_POST['planoTelefone'])) {
        $dadosCliente['planoTelefone'] = $_POST['planoTelefone'];
    } else {
        $dadosCliente['planoTelefone'] = "";
    }
    if (isset($_POST['planoInternet'])) {
        $dadosCliente['planoInternet'] = $_POST['planoInternet'];
    } else {
        $dadosCliente['planoInternet'] = "";
    }
    if (isset($_POST['planoTV'])) {
        $dadosCliente['planoTV'] = $_POST['planoTV'];
    } else {
        $dadosCliente['planoTV'] = "";
    }


    if (!$tem_erro) {
        $produto = $dadosCliente['planoTelefone'] . "+" . $dadosCliente['planoInternet'] . "+" . $dadosCliente['planoTV'];
        $dadosCliente['produto']=$produto;
        $dadosCliente['id']=$_GET['id'];
        atualizaCliente($conn, $dadosCliente,$_SESSION['usr_session']);
    }
}