<?php

include_once '../conexao.php';

$usr = filter_input(INPUT_GET, 'usr_name');
$sql = "SELECT * FROM usuarios WHERE usr_login=\"$usr\"";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    echo 'Usuário Já existente';
} else{
    echo 'Ok';
}