<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Raimax Login</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/signin.css">

</head>

<body>
    <div class="login-form">
        <img src="img/RaimaxMouraSoftware.png" alt="Imagem" class="img-fluid w-25 rounded d-block mx-auto mb-3">
        <h2>Área Restrita</h2>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } ?>
        <form method="POST" action="valida.php">

            <div class="form-label text-center mb-3">
                <label for="">Usuário</label>
                <input type="text" class="form-control" name="usuario" placeholder="Digite seu usuário" required>
            </div>

            <div class="form-label text-center mb-3">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
            </div>
            
            <!-- Botão de login -->
            <input class="btn btn-primary w-100" type="submit" name="btnLogin" value="Acessar">

                <div class="text-center mt-3">
                    <a href="#">Esqueceu a senha?</a>
                </div>
        </form>
    </div>

    <script rel="stylesheet" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script rel="stylesheet" src="assets/js/bootstrap.min.js"></script>
    <script rel="stylesheet" src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>