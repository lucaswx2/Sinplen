<div class="modal fade" id="cadastrarUsuario">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span>&times;</button>
                <h4 class="modal-title">Cadastrar Usuario</h4>
            </div>
            <div class="modal-body">

                <div class="panel-body">
                    <form  method="post" autocomplete="off">
                        <div class="row">
                            <div class='col-sm-6'>
                                <h4>Nome do Usuário:</h4>
                                <input class="form-control" type="text" name="usr_name" placeholder="Nome do Usuário" maxlength="100" required>
                               
                            </div>
                            <div class='col-sm-6'>
                                <h4>CPF do Usuário:</h4>
                                <input class="form-control cpf" type="text" name="usr_cpf" maxlength='14' placeholder="CPF do Usuário" required>
                            </div>
                        </div><br>
                        <div class='row'>
                            <div class="col-sm-6">
                                Login:
                                <input class="form-control" type="text" name="usr_login" placeholder="Login do Usuário" required >
                                 <div id="resultado" style="color: black" ></div>
                            </div>
                            <div class="col-sm-6">
                                Senha:
                                <input class="form-control pwd_num" type="password" name="usr_pwd" placeholder="Apenas números" maxlength="6" required >
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-6'>
                                <h2>Email</h2>
                                <input type='text' placeholder="Email" name='usr_email' class='form-control email' required>
                            </div><br><br><br>
                            <div class='col-sm-4'>
                                <select class='form-control' name='nv_acesso'>
                                    <option value='1' selected>Vendedor</option>
                                    <option value='2'>Operador</option>
                                    <option value='3'>Supervisor</option>
                                    <option value='4'>Diretor</option>
                                </select>
                            </div>
                        </div><br><br>
                        <div class='row'>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-style" id="cadastrar">Cadastrar Usuário</button>
                                <button type="reset" class="btn btn-style-limpar">Resetar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="../js/jquery-1.12.2.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("input[name='usr_login']").on('blur', function () {
            var nomeUsuario = $("input[name='usr_login']").val();
            console.log(nomeUsuario);
            $.post('verificaUsr.php?usr_name=' + nomeUsuario, function (data) {
                if (data != 'Ok') {
                    $('#cadastrar').prop('disabled', true);
                    $('#resultado').addClass("alert alert-danger");
                    $('#resultado').html(data);
                } else {
                    $('#resultado').removeClass("alert alert-danger");
                    $('#resultado').html('');
                    $('#cadastrar').prop('disabled', false);
                }
            });

        })


    });
</script>



<?php
if (isset($_POST['usr_name']) && isset($_POST['usr_login']) && isset($_POST['usr_pwd']) && isset($_POST['usr_cpf']) && isset($_POST['usr_email']) && isset($_POST['nv_acesso'])) {
    inserirUsr($_POST['usr_name'], $_POST['usr_login'], $_POST['usr_pwd'], $_POST['usr_cpf'], $_POST['usr_email'], $_POST['nv_acesso'], $conn, $_SESSION['usr_session']);
}
?>