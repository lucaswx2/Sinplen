<!-- Barra de Navegação -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <span class="navbar-style">Sinplen - Soluções em Ti</span> 
            </a>
        </div>
        <ul class="list-inline nav navbar-nav">
            <li><a href="../sinplen/index.php" class="navbar-style-link">Página inicial</a></li>
            <li><a href="#" class="navbar-style-link">O que é o Sinplen?</a></li>
            <li><a href="#" class="navbar-style-link">Contato</a></li>
        </ul>
        <a class="btn btn-inverse navbar-link navbar-right" id="botaoLogar" href="./login.php">
            <?php echo(isset($_SESSION['usr_session']) ? 'Acessar' : 'Logar-se'); ?>
        </a>
    </div>
</nav>
<!--Fim da barra de Navegação-->