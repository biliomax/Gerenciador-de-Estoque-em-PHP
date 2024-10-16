<?php

if (!isset($seguranca)) {
    exit;
}
?>

<div class="well conteudo">
    <div class="pull-right">
        <a href="<?php echo pg . '/listar/list_usuarios' ?>">
            <button class="btn btn-xs btn-roxo" type="button">Listar</button>
        </a>
    </div>

    <div class="page-header">
        <h1>Cadastrar Usuário</h1>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <form action="<?php echo pg; ?>/processa/proc_cad_usuarios" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-6">
                <input type="e" name="nome" class="form-control" placeholder="Nome" value="<?php if (isset($_SESSION['dados']['nome'])) { echo $_SESSION['dados']['nome']; } ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-6">
                <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php if (isset($_SESSION['dados']['email'])) { echo $_SESSION['dados']['email']; } ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Usuário</label>
            <div class="col-sm-6">
                <input type="text" name="usuario" class="form-control" placeholder="Senha" value="<?php if (isset($_SESSION['dados']['usuario'])) { echo $_SESSION['dados']['usuario']; } ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Usuário</label>
            <div class="col-sm-6">
                <input type="password" name="senha" class="form-control" placeholder="Senha alfanúmerica" value="<?php if (isset($_SESSION['dados']['senha'])) { echo $_SESSION['dados']['senha']; } ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success" value="Cadastrar" name="SendCadUsuario">
            </div>
        </div>
    </form>
</div>