<?php

include '../conexao.php';

$id = $_GET['id'];
$sql=  mysqli_query($conn, "SELECT * FROM cidades WHERE estado_id ='$id' ORDER BY nome ;");

while($row= mysqli_fetch_array($sql)){
    $nome = $row['nome'];
    $id = $row['id'];
    
    echo '<option value="'.$nome.'" class="cidades">'.$nome.'</option>';
    
}