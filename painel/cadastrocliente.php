<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../conexao.php';
include 'consultaspainel.php';
require_once './validacaoCliente.php';
if (isset($_SESSION['usr_session'])) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>SinPlen - Gerenciador de Vendas</title>
            <link href="../estilo/bootstrap.min.css" rel="stylesheet"/>
            <link href="../estilo/estilosistema.css" rel="stylesheet"/>
            <script type="text/javascript" src="../js/jquery-1.12.2.min.js"></script>
            <script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
            <script type="text/javascript" src="../js/funcao.js"></script>


        </head>
        <body>
            <?php include_once '../includes/cabecalho_painel.php'; ?>
            <div class="container" style="border:5px double grey;background-color: whitesmoke">
                <form class="form-horizontal formcliente" method="post" >
                    <h2>Formulario de Cadastro de Clientes</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" placeholder="Nome" class="form-control nome" name="nome" id='nome' maxlenght="255" required >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" placeholder="RG" class="form-control rg" name="rg" maxlength="20" required>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="cpf" placeholder="CPF" class="form-control cpf" maxlength="14" required >
                            <div id="cpfDiv" style="color:black"></div>
                        </div>
                        <div class='col-sm-3'>
                            <label for="data_nsc">Data de Nascimento</label>
                            <input type='date' name='data_nsc' required class='form-control' max="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="cep" placeholder="Cep"  class="form-control cep" required id="cep">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <input type="text" name="endereco" placeholder="Endereço"class="form-control" maxlength="50" required id="endereco"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Bairro" name="bairro" type="text" maxlength="50" required id="bairro">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <select name="estados" id="estados"  class="form-control" required> 
                                <option value="" SELECTED> UF</option>
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
                            <select name="cidades" class="form-control" id="cidades" required>
                                <option value="" SELECTED>Escolha sua cidade</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" name="telefone1" placeholder="Primeiro Telefone..." class="form-control telefone" maxlength="14" required> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 ">
                            <input type="text" name="telefone2" placeholder="Segundo Telefone..." class="form-control telefone" maxlength="14" required> 
                        </div>
                    </div>
                    <div class="row">
                        <h1 class="text-info bg-primary text-center" style="border:1px double black"> Produtos</h1>
                    </div>
                    <div class="row">
                        <div class="form-control col-sm-4 pull-right">
                            <label> <input type="checkbox" name="desejaproduto" class="checkbox-inline" id="desejaproduto" >
                                <b>Não desejo adicionar um produto</b></label>
                        </div>
                    </div>
                    <div class="row">
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
                            <div class="">
                                <button type="submit" class="btn btn-md btn-style btnSubmit" >Cadastrar</button>
                                <button type="reset" class="btn btn-md btn-style-limpar">Limpar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <script type="text/javascript" src="../js/validacaoJS.js"></script>

        </body>
    </html>

    <?php
} else {
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../index.php'>";
}
?>