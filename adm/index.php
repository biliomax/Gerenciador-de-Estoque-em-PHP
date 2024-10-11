<?php
session_start();

// Segurança do ADM
$seguranca = true;
include_once("config/seguranca.php");

seguranca();

// Biblioteca auxiliares
include_once("config/config.php");
include_once("config/conexao.php");
include_once("lib/lib_valida.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Max ADM</title>
</head>
<body>
    <?php
        echo "Bem vindo ". $_SESSION['nome'];
        echo "<br> <a href='sair.php'>Sair </a>";

        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // echo '<br>'. $url;
        $arquivo_or = (!empty($url)) ? $url : 'home';
        $arquivo = limparurl($arquivo_or);
        // echo $arquivo;

        $file = $arquivo . '.php';
        
        if(file_exists($file)){
            include $file;
        } else {
            include_once("home.php");
        }
    ?>
</body>
</html>

