<!-- Barra de Navegação -->
<?php
include_once '../conexao.php';
include_once '../funcoes.php';
include_once '../administrador/consultaUsr.php';
?>
<div class="row" style="margin-bottom: 35px;">

    <nav style="color:#cfab75;background-color:#201f1f;" class="navbar navbar-inverse  navbar-fixed-top " role="navegation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../painel/index.php">
                    <span class="navbar-style"> Sinplen - Soluções em Ti</span> 
                </a>
            </div>
            <ul class="list-inline nav navbar-nav">
                <li><a href="../painel/consulta.php" class="navbar-style-link">Consultar Clientes</a></li>
                <li><a href="../painel/cadastrocliente.php" class="navbar-style-link">Cadastrar Cliente</a></li>
                <?php
                if ($_SESSION['nv_acesso'] == 3) {
                ?>
                <li><a data-toggle="modal" href="#consultaUsuario">Listar Usuários</a></li>
                <?php
                }
                if (isset($_SESSION['nv_acesso']) && $_SESSION['nv_acesso'] > 3) {
                    echo '<li><a href="../administrador/index.php">Administrador</a></li>';
                }
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Mais <span class="caret"></span></a>
                    <ul class="dropdown-menu ">
                        <li><a data-toggle="modal" href="#meusDados">Meus Dados</a></li>
                        <li><a  href="../administrador/alterarsenha.php">Alterar Senha</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="?vai=sair" class="alert alert-danger" style="color: black">Deslogar &times;</a></li>
                    </ul>

            </ul>

        </div>
    </nav>
</div>
<!--Fim da barra de Navegação-->
<div class="modal fade" id="meusDados">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span>&times;</button>
                <h4 class="modal-title">Meus Dados</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="col-sm-10">
                            <h3>Nome:</h3>
                            <input type="text" name="session_name" value="<?php echo @$_SESSION['name'] ?>" readonly class="form-control">
                            <h3>Nome de Usuário:</h3>
                            <input type="text" name="session_usr" value="<?php echo @$_SESSION['usr_session'] ?>" readonly class="form-control">
                            <h3>CPF:</h3>
                            <input type="text" name="session_cpf" value="<?php echo @$_SESSION['cpf'] ?>" readonly class="form-control">
                            <h3>Email:</h3>
                            <input type="text" name="session_email" value="<?php echo @$_SESSION['email'] ?>" readonly class="form-control">
                            <h3>Nivel de Ácesso:</h3>
                            <input type="text" name="session_nvacesso" value="<?php echo @$_SESSION['nv_acesso'] ?>" readonly class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>






<script type="text/javascript" src="../js/jquery-1.12.2.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="../js/funcao.js"></script>

<script type="text/javascript" src="../js/validacaoJS.js"></script>



<?php
if (@$_GET['vai'] == 'sair') {
    session_unset();
    session_destroy();
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0,../index.php'>";
}
?>

