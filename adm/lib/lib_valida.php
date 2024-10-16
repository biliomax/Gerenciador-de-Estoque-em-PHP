<?php

if (!isset($seguranca)) {
    exit;
}

function limparurl($conteudo)
{
    $formato_a = '"!@#$%*()-+={[}];:,\\\'<>°ºª';
    $formato_b = '_____________________________';
    $formato_ct = strtr($conteudo, $formato_a, $formato_b);

    $conteudo_branco = str_ireplace(" ", "", $formato_ct);

    $conteudo_st = strip_tags($conteudo_branco);

    $conteudo_lp = trim($conteudo_st);

    return $conteudo_lp;
}

function limparSenha($conteudo)
{
    $formato_a = '"#$*()-+={[}]/?;:,\\\'<>°ºª';
    $formato_b = '                ';
    $formato_ct = strtr($conteudo, $formato_a, $formato_b);

    $conteudo_branco = str_ireplace(" ", "", $formato_ct);

    $conteudo_st = strip_tags($conteudo_branco);

    $conteudo_lp = trim($conteudo_st);
    //1' OR '1=1
    //1OR11

    return $conteudo_lp;
}

/**  
 * Function vazio($dados) 
 * Verifica se os inputs estão vazios 
 * $dados
*/
function vazio($dados)
{
    $dados_st = array_map('strip_tags', $dados);
    $dados_tr = array_map('trim', $dados_st);

    if (in_array('', $dados_tr)) {
        return false;
    } else {
        return $dados_tr;
    }
}

function validarEmail($email) {
    $condicoes = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z0-9_\.\-]{2,4}$/';
    if (preg_match($condicoes, $email)) {
        return true;
    } else {
        return false;
    }
}
