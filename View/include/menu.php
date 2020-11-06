<?php
session_start();
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="home.php" class="navbar-brand">
            <span>Agenda de Contatos</span>
        </a>

        <div class="collapse navbar-collapse" id="menu">
            <div class="navbar-header">
                <ul class="navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="busca.php">Buscar</a></li>
                    <li><a href="cadastro.php">Cadastrar</a></li>
                    <li>
                        <?php
                        if (isset($_SESSION['id'])) {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?= $_SESSION['nome']; ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" id="logout" onclick="efetuarLogout()">Logout</a>
                                    </li>
                                    <li>
                                        <a href="#" id="logout" onclick="efetuarLogout()">Editar</a>
                                    </li>
                                    <li>
                                        <a href="exclusao.php">Excluir</a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <a href="login.php">Login</a>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div> <!-- fecha /menu -->
    </div> <!-- fecha /container -->
</nav> <!-- fecha /barra de navegação -->

<!-- modal -->
<div id="modalLoading" class="modal-loading animated bounceIn"></div>