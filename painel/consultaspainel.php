<?php

function insereClienteBD($nome, $cpf, $endereco, $telefone_1, $telefone_2, $rg, $produto, $estado, $cidade, $cep, $conn, $bairro, $data_nsc, $usuarioLogado) {
    $sql = "INSERT INTO cliente(nome,cpf,rg,estado,cidade,cep,endereco,telefone_1,telefone_2,bairro,data_nsc,produto) "
            . "VALUES(\"$nome\",\"$cpf\",\"$rg\",\"$estado\",\"$cidade\",\"$cep\",\"$endereco\","
            . "\"$telefone_1\",\"$telefone_2\",\"$bairro\",\"$data_nsc\",\"$produto\");";


    $log_data = date('d-m-Y H:i:s');
    mysqli_query($conn, "INSERT INTO log(data_hora,acao,user) VALUES (\"$log_data\",'Cadastrou novo Cliente',\"$usuarioLogado\")");
    return mysqli_query($conn, $sql);
}

function pesquisarClienteNome($nome, $conn) {
    $sql = "SELECT cliente.nome,cliente.cpf,cliente.cidade,estados.sigla,cliente.id_cliente FROM cliente JOIN estados WHERE cliente.nome LIKE \"%$nome%\" AND cliente.estado=estados.id";

    $consulta = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($consulta)) {
        echo '<tr>';
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['cpf'] . "</td>";
        echo "<td>" . $row['cidade'] . "/" . $row['sigla'] . "</td>";
        echo "<td> <a href=clienteDetalhado.php?id=" . $row['id_cliente'] . "> <span class=\"bg-default glyphicon glyphicon-pencil btn-lg\"></span> </a></td>";
        echo '</tr>';
    }
}



function validarCPF($conn, $cpf) {
    $padrao = "/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/";
    $resultado = preg_match($padrao, $cpf);
    $consulta = mysqli_query($conn, "SELECT * FROM cliente where cpf='" . $cpf . "'");
    $numeroLinhas = mysqli_num_rows($consulta);
    if ($resultado) {
        if ($numeroLinhas >= 1) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}


function detalharCliente($id, $conn) {
    $sql = "SELECT cliente.nome,cliente.cpf,cliente.data_nsc,cliente.endereco,cliente.telefone_1,"
            . "cliente.telefone_2,cliente.rg,cliente.cidade,estados.sigla as estado,cliente.cep,cliente.bairro"
            . ",cliente.produto FROM cliente JOIN estados WHERE id_cliente=$id AND cliente.estado=estados.id";
    $resultado = mysqli_query($conn, $sql);
    $dados = array();
    while ($row = mysqli_fetch_array($resultado)) {
        $dados['nome'] = $row['nome'];
        $dados['cpf'] = $row['cpf'];
        $dados['data_nsc'] = $row['data_nsc'];
        $dados['endereco'] = $row['endereco'];
        $dados['telefone_1'] = $row['telefone_1'];
        $dados['telefone_2'] = $row['telefone_2'];
        $dados['rg'] = $row['rg'];
        $dados['cidade'] = $row['cidade'];
        $dados['estado'] = $row['estado'];
        $dados['cep'] = $row['cep'];
        $dados['bairro'] = $row['bairro'];
        $dados['produto'] = $row['produto'];
    }

    return $dados;
}

function removerCliente($conn, $id) {
    $sql = "DELETE FROM cliente WHERE id_cliente=" . $id;

    mysqli_query($conn, $sql);
}

function atualizaCliente($conn, $dados, $usuarioLogado) {

    $sqlEditar = "
        UPDATE cliente SET
            nome = '{$dados['nome']}',
            cpf = '{$dados['cpf']}',
            data_nsc = '{$dados['data_nsc']}',
            endereco = '{$dados['endereco']}',
            telefone_1 = '{$dados['telefone1']}',
            telefone_2 = '{$dados['telefone2']}',
            rg = '{$dados['rg']}',
            cidade = '{$dados['cidades']}',
            estado = {$dados['estados']},
            cep = '{$dados['cep']}',
            bairro = '{$dados['bairro']}',
            produto = '{$dados['produto']}'
        WHERE id_cliente = {$dados['id']}
    ";
    $log_data = date('d-m-Y H:i:s');
    mysqli_query($conn, "INSERT INTO log(data_hora,acao,user) VALUES (\"$log_data\",'Editou cliente {$dados['id']}',\"$usuarioLogado\")");


    if (mysqli_query($conn, $sqlEditar)) {
        echo '<script>alert("Editado com Sucesso!!);</script>';
    }
}

function pesquisarProduto($tipo, $conn) {
    $sql = "SELECT * FROM produtos WHERE tipo =$tipo";
    $resultado = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($resultado)) {
        echo '<tr>';
        echo "<td>" . $row['nome'] . '</td>';
        echo "<td> R$ " . $row['preco'] . '</td>';
        echo "<td>" . $row['descricao'] . '</td>';
        echo "<td> <a href=alterarProduto.php?id=" . $row['id'] . "> <span class=\"bg-default glyphicon glyphicon-pencil btn-lg\"></span> </a></td>";
        echo '</tr>';
    }
}

function detalharProduto($id, $conn) {
    $sql = "SELECT * FROM produtos WHERE id =$id";
    $resultado = mysqli_query($conn, $sql);
    return mysqli_fetch_array($resultado);
}

function alteraProduto($conn, $nome, $tipo, $preco, $descricao, $id) {
    $sql = "UPDATE `produtos` SET `nome` = '$nome', `tipo` = $tipo, `preco` = $preco, `descricao` = '$descricao' WHERE `produtos`.`id` = $id";

    if (mysqli_query($conn, $sql)) {
        echo 'Alterado com Sucesso';
    } else {
        echo 'Erro, não foi possivel alterar o produto';
    }
}

function listarUsr($conn) {
    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($resultado)) {
        echo '<tr>';
        echo '<td >' . $row['usr_name'] . '</td>';
        echo '<td><a class="linkEditar" href="editarUsr.php?id=' . $row['usr_id'] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>';
        echo '</tr>';
    }
}

function consultaUsuario($conn, $id) {
    $sql = "SELECT * FROM usuarios where usr_id=$id";
    $resultado = mysqli_query($conn, $sql);

    return mysqli_fetch_array($resultado);
}

function removerUsuario($conn, $id) {
    $sql = "DELETE FROM usuario where usr_id=$id";
    echo $sql;
    mysqli_query($conn, $sql);
}

function alterarUsuario($conn, $usr_name, $usr_pwd, $usr_cpf, $usr_email, $usr_nvacesso, $usr_id) {
    $sql = "UPDATE usuarios SET usr_name = '$usr_name', usr_pwd = $usr_pwd, usr_cpf = '$usr_cpf', usr_email = '$usr_email', usr_nvacesso = $usr_nvacesso WHERE usr_id = $usr_id";

    if (mysqli_query($conn, $sql)) {


        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,editarUsr.php?id=" . $usr_id . "'>";
        echo '<script>alert("Alterado com sucesso!")</script';
    } else {
        echo 'Erro ao alterar!';
    }
}
