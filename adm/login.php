<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title>Raimax - Login</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/signin.css" rel="stylesheet">        
        <link href="assets/css/personalizado_login.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form method="POST" action="valida.php" class="form-signin">
                <h2 class="form-signin-heading">Área Restrita</h2>
                <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    } ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuário:</label>
                    <input type="text" name="usuario" required placeholder="Digite o seu usuário" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Senha:</label>
                    <input type="password" name="senha" required placeholder="Digite a sua senha" class="form-control">
                </div>

                <input type="submit" name="btnLogin" value="Acessar" class="btn btn-verde btn-block">     
            </form>
        </div>
        <!-- <script rel="stylesheet" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>