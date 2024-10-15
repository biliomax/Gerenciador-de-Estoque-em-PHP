<?php

/**
 * Nome do arquivo: proc_cad_usuarios.php
 * Descrição: Processa cadastro de usuário.
 * Autor: Raimax Moura
 * Data: 2024-10-15
 * PHP Version: 8.1
 */

if (!isset($seguranca)) {
    exit;
}

$SendcadUsuario = filter_input(
    INPUT_POST,
    'SendCadUsuario',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
);

if ($SendcadUsuario) {
    $nome = filter_input(
        INPUT_POST,
        'nome',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $email = filter_input(
        INPUT_POST,
        'email',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    $usuario = filter_input(
        INPUT_POST,
        'usuario',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    $senha = filter_input(
        INPUT_POST,
        'senha',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    $niveis_acesso_id = 2;
    $situacoes_usuario_id = 1;

    $result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha, niveis_acesso_id, situacoes_usuario_id, created)
    VALUES ('$nome', '$email', '$usuario', '$senha', '$niveis_acesso_id', '$situacoes_usuario_id', NOW())";

    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso</div>";
        $url_destino = pg . "/listar/list_usuarios";
        header("Location: $url_destino");
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar usuário</div>";
        $url_destino = pg . "/cadastrar/cad_usuarios";
        header("Location: $url_destino");
    }
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao carregar a página!</div>";
    $url_destino = pg . "/listar/list_usuarios";
    header("Location: $url_destino");
}
