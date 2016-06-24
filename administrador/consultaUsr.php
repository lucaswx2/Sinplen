<!DOCTYPE html>
<?php
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
        <div class="container">

            <div class="modal fade" id="consultaUsuario">
               
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span>&times;</button>
                            <h4 class="modal-title">Usuários</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" value="<?php echo $_SESSION['nv_acesso']?>" id="nvacesso"/>
                            <table class="table table-hover table-bordered" style="text-align: justify" >
                                <thead>
                                    <tr>
                                        <th style="text-align: justify"><h3>Nome</h3></th>
                                        <th style="text-align: justify"><h3>Detalhar</h3></th>
                                    </tr>
                                </thead>
                                <tbody class="table-hover">
                                    <?php listarUsr($conn) ?>

                                </tbody>
                            </table> 

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../js/jquery-1.12.2.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            
            $(function(){
                if($('#nvacesso').val()!=4){
                    $('.linkEditar').attr('href','#');
                }
            });
            
        </script>
    </body>
</html>
