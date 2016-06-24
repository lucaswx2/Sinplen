<?php

date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION)) {
    session_start();
};
include_once "conexao.php";

function checarLogin($login, $senha, $conn) {

    $query = mysqli_query($conn, "SELECT * FROM usuarios where usr_login='$login';");

    if (mysqli_num_rows($query) <= 0) {
        return false;
    } else {
        while ($row = mysqli_fetch_assoc($query)) {
            $dadosUsr['password'] = $row['usr_pwd'];
        }
        if ($dadosUsr['password'] === $senha) {
            $log_data = date('d-m-Y H:i:s');
            mysqli_query($conn, "INSERT INTO log(data_hora,acao,user) VALUES (\"$log_data\",'Login',\"$login\")");
            return true;
        } else {

            return false;
        }
    }
}

function inserirUsr($nome, $login, $senha, $cpf, $email, $nivel, $conn, $usuarioLogado) {
    $query = "INSERT INTO usuarios(usr_name,usr_login,usr_pwd,usr_cpf,usr_email,usr_nvacesso) VALUES(\"$nome\", \"$login\", \"$senha\", \"$cpf\", \"$email\", $nivel)";
    $log_data = date('d-m-Y H:i:s');
    mysqli_query($conn, "INSERT INTO log(data_hora,acao,user) VALUES (\"$log_data\",'Inserir Usuario',\"$usuarioLogado\")");
    mysqli_query($conn, $query);
}

function consultarUsr($login, $conn) {
    $query = mysqli_query($conn, "SELECT * FROM usuarios where usr_login='$login';");
    while ($row = mysqli_fetch_assoc($query)) {
        $dadosUsr['id'] = $row['usr_id'];
        $dadosUsr['cpf'] = $row['usr_cpf'];
        $dadosUsr['email'] = $row['usr_email'];
        $dadosUsr['login'] = $row['usr_login'];
        $dadosUsr['name'] = $row['usr_name'];
        $dadosUsr['nv_acesso'] = $row['usr_nvacesso'];
        $dadosUsr['usr_pwd'] = $row['usr_pwd'];
    }

    return $dadosUsr;
}

function inserirProduto($nome, $tipo, $preco, $descricao, $conn, $usuarioLogado) {
    $query = "INSERT INTO produtos(nome,tipo,preco,descricao) VALUES('$nome','$tipo',$preco,'$descricao');";
    $log_data = date('d-m-Y H:i:s');
    mysqli_query($conn, "INSERT INTO log(data_hora,acao,user) VALUES (\"$log_data\",'Inserir Produto',\"$usuarioLogado\")");
    mysqli_query($conn, $query);
}

function traduz_data_para_exibir($data) {

    if ($data == "" OR $data == "0000-00-00") {
        return "";
    }
    $dados = explode("-", $data);
    if (count($dados) != 3) {
        return $data;
    }
    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
    return $data_exibir;
}

function traduz_data_para_bancos($data) {
    if ($data == "") {
        return "";
    }
    $dados = explode("/", $data);

    if (count($dados) != 3) {
        return $data;
    }
    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    return $data_mysql;
}

function estadoNomeParaId($conn, $nomeEstado) {

    $id = NULL;
    $sql = "SELECT id FROM estados WHERE sigla='$nomeEstado'";

    $resultado = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($resultado)) {
        $id = $row['id'];
    }

    return $id;
}

function checaAcessoAdm($nvacesso) {
    if ($nvacesso < 4) {
        return false;
    } else {
        return true;
    }
}

function checaSession($session_usr) {
    if (strlen($session_usr) < 1) {
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../painel/index.php'>";
    }
}

function alterarSenha($senhaAnterior, $senhaNova, $senhaNovaR, $senhaSession, $idSession, $conn, $usuarioLogado) {
    $valido = false;
    $mensagem = array();


    if ($senhaAnterior == $senhaSession) {
        if ($senhaNova == $senhaNovaR) {
            if (strlen($senhaNova) > 0) {
                $valido = true;
            } else {
                $mensagem[2] = "Preencha o campo senha";
            }
        } else {
            $mensagem[0] = "As senhas não são iguais";
        }
    } else {
        $mensagem[1] = "Senha anterior incorreta";
    }

    if ($valido) {
        $sql = "UPDATE `usuarios` SET `usr_pwd` =$senhaNova WHERE `usuarios`.`usr_id` = $idSession";
        mysqli_query($conn, $sql);
        $mensagem[] = "Senha alterada com sucesso";
        $log_data = date('d-m-Y H:i:s');
        mysqli_query($conn, "INSERT INTO log(data_hora,acao,user) VALUES (\"$log_data\",'Alterou a senha',\"$usuarioLogado\")");
    }
    return $mensagem;
}
