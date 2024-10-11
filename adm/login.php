<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br>
<head>
    <meta charset="utf8">
    <title>Raimax Login</title>
</head>

<body>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

    <form method="POST" action="valida.php">
        <label for="">Usuário</label>
        <input type="text" name="usuario" require placeholder="Digite seu usuário">

        <label for="">Senha</label>
        <input type="password" name="senha" require placeholder="Digite a sua senha">

        <input type="submit" name="btnLogin" value="Acessar">

    </form>
</body>

</html>