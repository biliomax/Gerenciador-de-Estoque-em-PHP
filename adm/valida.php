<?php

session_start();

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Se você quiser garantir que a string não contenha HTML
if ($btnLogin !== null) {
    $btnLogin = htmlspecialchars($btnLogin, ENT_QUOTES, 'UTF-8'); // Agora $btnLogin estará seguro para uso
} 

// Verificando se $btnLogin não está vazio
if ($btnLogin) {

    $seguranca = true;
    include_once("config/conexao.php");
    include_once("lib/lib_valida.php");

    $usuario_rc = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $senha_rc = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    echo "<br> Senha RC:". $senha_rc."<br>";

    $usuario = limparSenha($usuario_rc);
    $senha = limparSenha($senha_rc);

    echo "$usuario - $senha <br>";

    if((!empty($usuario)) AND (!empty($senha))){
        echo password_hash($senha, PASSWORD_DEFAULT);

        $result_usuario = "SELECT id, nome, email, senha, niveis_acesso_id FROM usuarios WHERE usuario='$usuario' LIMIT 1";
        $result_usuario = mysqli_query($conn, $result_usuario);

        if($result_usuario){

            $row_usuario = mysqli_fetch_assoc($result_usuario);
            if(password_verify($senha, $row_usuario['senha'])){
                /* echo "<br> Senha válida: " . $row_usuario['email'] . "<br>";*/

                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                $_SESSION['email'] = $row_usuario['email'];
                $_SESSION['niveis_acesso_id'] = $row_usuario['niveis_acesso_id'];

                header("Location: index.php");

            } else {
                $_SESSION['msg'] = "Login ou senha incorreto";
                header("Location: login.php");
            }
            
        }

    } else {
        $_SESSION['msg'] = "Login ou senha incorreto";
        header("Location: login.php");
    }

} else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: login.php");
}


