<?php

if(!isset($seguranca)){exit;}

function limparurl($conteudo){
    $formato_a = '"!@#$%*()-+={[}];:,\\\'<>°ºª';
    $formato_b = '_____________________________';
    $formato_ct = strtr($conteudo, $formato_a, $formato_b);

    $conteudo_branco = str_ireplace(" ", "", $formato_ct);

    $conteudo_st = strip_tags($conteudo_branco);

    $conteudo_lp = trim($conteudo_st);

    return $conteudo_lp;
}

function limparSenha($conteudo){
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