<?php

include_once '../conexao.php';

$cpf = filter_input(INPUT_GET, 'cpf');
$padrao = "/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/";
$resultado = preg_match($padrao, $cpf);
$sql = "SELECT * FROM cliente where cpf='" . $cpf . "'";
$consulta = mysqli_query($conn, $sql);
$numeroLinhas = mysqli_num_rows($consulta);

if (!$resultado) {
    echo 'Cpf Inválido';
} else {
    if ($numeroLinhas > 0) {
        echo 'Cpf já consta na base de dados';
    }else{
        echo 1;
    }
}
