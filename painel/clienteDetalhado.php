<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once './consultaspainel.php';
include_once '../conexao.php';
include_once '../funcoes.php';
if (!isset($_SESSION)) {
    session_start();
};
if (isset($_SESSION['usr_session'])) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>SinPlen - Gerenciador de Vendas</title>
            <link href="../estilo/bootstrap.min.css" rel="stylesheet">
            <link href="../estilo/estilosistema.css" rel="stylesheet"/>

        </head>
        <body>


            <div class="container-fluid">
                <?php include_once '../includes/cabecalho_painel.php'; ?>
                <br>
                <div class="row">

                    <?php $resultado = detalharCliente($_GET['id'], $conn) ?>
                    <?php
                    if (@$_GET['erro'] == 1) {
                        echo '<script>alert("Você não tem acesso para Editar o cliente")</script>';
                    }
                    ?>




                    <div class="container" style="background-color:lightgrey">
                        <form class="form-horizontal" method="post" >

                            <legend >Consulta</legend>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" placeholder="Nome" class="form-control nome" name="nome" id='nome' 
                                           maxlenght="255" value="<?php echo $resultado['nome'] ?>"readonly required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" placeholder="RG" class="form-control rg" name="rg" maxlength="20" required value="<?php echo $resultado['rg'] ?>"readonly>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="cpf" placeholder="CPF" class="form-control cpf" maxlength="14" value="<?php echo $resultado['cpf'] ?>"readonly required>
                                    <label class='alert-danger'><?php
                                        if (isset($campoErrado['cpf'])) {
                                            echo $campoErrado['cpf'];
                                        }
                                        ?></label>
                                </div>
                                <div class='col-sm-3'>
                                    <input type='date' name='data_nsc' required class='form-control' value="<?php echo $resultado['data_nsc'] ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <input type="text" name="endereco" placeholder="Endereço"class="form-control" maxlength="" required value="<?php echo $resultado['endereco'] ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control" placeholder="Bairro" name="bairro" type="text" maxlength="50" required value="<?php echo $resultado['bairro'] ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <select name="cidades" class="form-control" id="cidades" required readonly>
                                        <option value="<?php echo $resultado['cidade'] ?>" SELECTED><?php echo $resultado['cidade'] ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="estados" id="estados"  class="form-control" required readonly> 
                                        <option value="<?php echo $resultado['estado'] ?>" SELECTED> <?php echo $resultado['estado'] ?></option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM estados;");
                                        while ($row = mysqli_fetch_array($sql)) {
                                            $id = $row['id'];
                                            $sigla = $row['sigla'];
                                            ?>
                                            <option value="<?php echo $id ?>"> <?php echo $sigla ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3 col-sm-offset-2">
                                    <input type="text" name="cep" placeholder="Cep"  class="form-control cep" required value="<?php echo $resultado['cep'] ?>"readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="text" name="telefone1" placeholder="Primeiro Telefone..." class="form-control telefone" maxlength="14" required value="<?php echo $resultado['telefone_1'] ?>"readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 ">
                                    <input type="text" name="telefone2" placeholder="Segundo Telefone..." class="form-control telefone" maxlength="14" required value="<?php echo $resultado['telefone_2'] ?>" readonly> 
                                </div>
                            </div>
                            <div class="row">
                                <h1 class="text-info text-center bg-primary" style="border:1px double black"> Produtos</h1>
                            </div>
                            <h3><?php echo $resultado['produto'] ?></h3>
                            <div class="row panel-footer">
                                <?php
                                if ($_SESSION['nv_acesso'] > 1) {
                                    ?>
                                    <div class="col-sm-3 pull-right">
                                        <div class="btn-group btn-group-lg">
                                            <a href="editarCliente.php?id=<?php echo $_GET['id'] ?>"><h2 class="glyphicon glyphicon-pencil" style="color:black">Editar</h2></a>

                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </form>
                    </div>


                </div>
            </div>


            <script src="../js/jquery-1.12.2.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>    
            <script src="../js/validacaoJS.js" type="text/javascript"></script>
            <script src='../js/funcao.js' type='text/javascript'></script>
        </body>
    </html>
    <?php
} else {
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../index.php'>";
}
?>