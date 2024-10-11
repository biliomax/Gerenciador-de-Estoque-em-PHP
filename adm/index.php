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
        echo "<br> <a href='sair.php'>Sair </a> <br>";

        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // echo '<br>'. $url;
        $arquivo_or = (!empty($url)) ? $url : 'home';
        $arquivo = limparurl($arquivo_or);
        // echo $arquivo;

        $niveis_acesso_id = $_SESSION['niveis_acesso_id'];
        
        $result_pagina = "SELECT pg.id, nivpg.id id_nivpg, nivpg.permissao
        FROM paginas pg
        INNER JOIN niveis_acessos_paginas nivpg ON nivpg.pagina_id=pg.id
        WHERE pg.endereco='$arquivo' AND nivpg.pagina_id=pg.id
        AND nivpg.niveis_acesso_id='$niveis_acesso_id' 
        AND nivpg.permissao=1 LIMIT 1";

        $resultado_pagina = mysqli_query($conn, $result_pagina);

        if(($resultado_pagina) AND ($resultado_pagina->num_rows != 0)){
            $row_pagina = mysqli_fetch_assoc($resultado_pagina);
            echo "Id da página: " . $row_pagina['id'] . "<br>";
            echo "Id da niveis_acessos_paginas: " . $row_pagina['id_nivpg'] . "<br>";
            echo "Id da permissao: " . $row_pagina['permissao'] . "<br>"; // var_dump($row_pagina);

            $file = $arquivo . '.php';
        
            if (file_exists($file)){
                include $file;
            } else {
                include_once("home.php");
            }

        } else {
            echo " Seu nivel de acesso não permite acessar essa função! <br>";
            include_once("home.php");
        }

    ?>
</body>
</html>

