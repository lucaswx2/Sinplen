<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (!isset($_SESSION)) {
    session_start();
};
if (isset($_SESSION['nv_acesso']) && $_SESSION['nv_acesso'] > 3) {
    include_once '../painel/consultaspainel.php';
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Tela do Administrador</title>
            <link href="../estilo/bootstrap.min.css" rel="stylesheet"/>
            <link href="../estilo/bootstrap-theme.min.css" rel="stylesheet" media="screen"/>
            <link href="../estilo/estilosistema.css" rel="stylesheet"/>
        </head>
        <body>
            <?php include_once '../includes/cabecalho_painel.php'; ?>

            <?php $dados = consultaUsuario($conn, $_GET['id']); ?>
            <div class="container" style="background-color: whitesmoke">
                <form  method="post">
                    <div class="row">
                        <div class='col-sm-6'>
                            <h4>CPF do Usuário:</h4>
                            <input class="form-control cpf" type="text" name="usr_cpf" maxlength='14' placeholder="CPF do Usuário" required value="<?php echo $dados['usr_cpf'] ?>">
                        </div>
                    </div><br>
                    <div class='row'>
                        <div class="col-sm-6">
                            Nome de Usuário:
                            <input class="form-control" type="text" name="usr_name" placeholder="Login do Usuário" required value="<?php echo $dados['usr_name'] ?>">
                        </div>
                        <div class="col-sm-6">
                            Senha:
                            <input class="form-control pwd_num" type="password" name="usr_pwd" placeholder="Apenas números" maxlength="6" required value="<?php echo $dados['usr_pwd'] ?>">
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <h4>Email</h4>
                            <input type='text' placeholder="Email" name='usr_email' class='form-control email' required value="<?php echo $dados['usr_email'] ?>">
                        </div><br><br><br>
                        <div class='col-sm-3'>
                            <select class='form-control' name='nv_acesso'>
                                <option value='1' 
                                <?php
                                echo ($dados['usr_nvacesso'] == 1 ? "selected" : "");
                                ?> >Vendedor</option>
                                <option value='2'
                                <?php
                                echo ($dados['usr_nvacesso'] == 2 ? "selected" : "");
                                ?>>Operador</option>
                                <option value='3'
                                <?php
                                echo ($dados['usr_nvacesso'] == 3 ? "selected" : "");
                                ?>>Supervisor</option>
                                <option value='4'
                                <?php
                                echo ($dados['usr_nvacesso'] == 4 ? "selected" : "");
                                ?>>Diretor</option>
                            </select>
                        </div>
                    </div><br><br>
                    <div class='row'>

                        <button type="submit" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-pencil">Alterar</span></button>


                        <span class="">
                            <?php
                            if (isset($_POST['usr_name'])) {
                                alterarUsuario($conn, $_POST['usr_name'], $_POST['usr_pwd'], $_POST['usr_cpf'], $_POST['usr_email'], $_POST['nv_acesso'], $_GET['id']);
                            }
                            ?>
                        </span>
                    </div>
                </form>
            </div>
        </body>
    </html>


    <?php
} else {
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../painel/index.php'>";
}
?>