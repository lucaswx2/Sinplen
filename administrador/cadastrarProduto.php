<div class="modal fade" id="cadastrarProduto">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span>&times;</button>
                <h4 class="modal-title">Cadastrar Produtos</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="post">
                    <div class="row">
                        <input type="text" name="nome_produto" placeholder="Nome do Produto" class="form-control" required maxlength="35">
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm-4" style="border:1px groove black">
                            <fieldset>
                                <legend>Tipo</legend>
                                <input type="radio" name="tipo_produto" value="1" checked >TV<br>
                                <input type="radio"  name="tipo_produto" value="2" >Internet<br>
                                <input type="radio" name="tipo_produto" value="3" >Telefone<br>
                            </fieldset>
                        </div>
                        <div class="col-sm-6 col-sm-offset-2">
                            <b>R$</b>
                            <input type="text" class="form-control"  id="dinheiro" placeholder="Preço do Produto" name="preco_produto" required maxlength="6">
                        </div>
                    </div><br><br>
                    <div class="row">
                        <input type="text" name="descricao_produto" placeholder="Descrição do Produto" class="form-control" required>
                    </div>
                    <div class="panel-footer">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-style">Cadastrar Produto</button>
                            <button type="reset" class="btn btn-style-limpar">Resetar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_POST['nome_produto']) && isset($_POST['nome_produto']) && isset($_POST['nome_produto']) && isset($_POST['nome_produto'])) {
    inserirProduto($_POST['nome_produto'], $_POST['tipo_produto'], $_POST['preco_produto'], $_POST['descricao_produto'], $conn,$_SESSION['usr_session']);
}
?>