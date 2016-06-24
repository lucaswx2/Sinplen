<?php

$conn = mysqli_connect("localhost", "root", "778083", "sinplen");
mysqli_set_charset($conn, 'utf8');

if(mysqli_connect_errno()!=0){
    echo "Não foi possivel conectar ao MySQL . ERRO#".
    mysqli_connect_errno()." : ".mysqli_connect_error();
}


