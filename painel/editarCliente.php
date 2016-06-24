<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../conexao.php';
include_once '../painel/consultaspainel.php';
include_once './validacaoEditar.php';
if (isset($_SESSION['nv_acesso']) && $_SESSION['nv_acesso'] > 1) {
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>SinPlen - Gerenciador de Vendas</title>
            <link href="../estilo/bootstrap.min.css" rel="stylesheet">
            <link href="../estilo/estilosistema.css" rel="stylesheet">
        </head>
        <body>

            <?php $resultado = detalharCliente($_GET['id'], $conn) ?>

            <br>
            <div class="container" style="background-color: white">
                <?php include_once '../includes/cabecalho_painel.php'; ?>
                <form class="form-horizontal formcliente" method="post" id="formeditar" >
                    <legend ><h1>Editar cliente</h1></legend>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" placeholder="Nome" class="form-control nome" name="nome" id='nome' 
                                   maxlenght="255" value="<?php echo $resultado['nome'] ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" placeholder="RG" class="form-control rg" name="rg" maxlength="20" required value="<?php echo $resultado['rg'] ?>">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="cpf" placeholder="CPF" class="form-control cpf" maxlength="14" value="<?php echo $resultado['cpf'] ?>" required>
                            <div id="cpfDiv"></div>
                        </div>
                        <div class='col-sm-3'>
                            <input type='date' name='data_nsc' required class='form-control' value="<?php echo $resultado['data_nsc'] ?>" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 ">
                            <input type="text" name="cep" placeholder="Cep"  class="form-control cep" required value="<?php echo $resultado['cep'] ?>" id="cep">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <input type="text" name="endereco" placeholder="Endereço"class="form-control" maxlength="" required value="<?php echo $resultado['endereco'] ?>" id="endereco">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Bairro" name="bairro" type="text" maxlength="50" required value="<?php echo $resultado['bairro'] ?>" id="bairro">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <select name="estados" id="estados"  class="form-control" required > 
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
                        <div class="col-sm-5">
                            <select name="cidades" class="form-control" id="cidades" required >
                                <option id='optionDefault' value="<?php echo $resultado['cidade'] ?>" SELECTED><?php echo $resultado['cidade'] ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="text" name="telefone1" placeholder="Primeiro Telefone..." class="form-control telefone" maxlength="14" required value="<?php echo $resultado['telefone_1'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 ">
                            <input type="text" name="telefone2" placeholder="Segundo Telefone..." class="form-control telefone" maxlength="14" required value="<?php echo $resultado['telefone_2'] ?>" > 
                        </div>
                    </div>
                    <div class="row">
                        <h1 class="text-info text-center bg-primary" style="border:1px double black"> Produtos</h1>

                    </div>
                    <div class="row">
                        <div class="form-control col-sm-4 pull-right">
                            <label>
                                <input type="checkbox" name="desejaproduto" class="checkbox-inline" id="desejaproduto" >
                                <b>Não desejo adicionar um produto</b></label>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Produto atual : <?php echo $resultado['produto'] ?></h3>
                        <div class="col-sm-4">

                            <select class="form-control" name="planoTelefone" id="telefone">
                                <option value="">
                                    Selecione um plano Telefone
                                </option>
                                <?php
                                $sql1 = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo=1");
                                while ($row = mysqli_fetch_array($sql1)) {

                                    echo '<option value="' . $row["nome"] . '">' . $row["nome"] . ' R$ ' . $row["preco"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" name="planoInternet" id="internet">
                                <option value="">
                                    Selecione um plano de Internet
                                </option>
                                <?php
                                $sql1 = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo=2");
                                while ($row = mysqli_fetch_array($sql1)) {

                                    echo '<option value="' . $row["nome"] . '">' . $row["nome"] . ' R$ ' . $row["preco"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" name="planoTV" id="tv">
                                <option value="">
                                    Selecione um plano de TV
                                </option>
                                <?php
                                $sql1 = mysqli_query($conn, "SELECT * FROM produtos WHERE tipo=3");
                                while ($row = mysqli_fetch_array($sql1)) {

                                    echo '<option value="' . $row["nome"] . '">' . $row["nome"] . ' R$ ' . $row["preco"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row panel-footer">
                        <div class="col-sm-3 pull-right">
                            <button  class='btn btn-lg btn-primary btnSubmit' type="submit" id="atualizar">Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>




            <script src="../js/jquery-1.12.2.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>   

            <script src="../js/validacaoJS.js" type="text/javascript"></script>
            <script src='../js/funcao.js' type='text/javascript'></script>

        </div>
    </body>
    </html>
    <?php
} else {
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../painel/clienteDetalhado.php?id={$_GET['id']}&erro=1'>";
}?>