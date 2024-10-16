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

//validar exetensão da imagem
function validarExtensao($foto) 
{
    switch($foto):
    case 'image/png';
    case 'image/x-png';
        return true;
            break;
    case 'image/jpeg';
    case 'image/pjpeg';
        return true;
            break;
    default:
        return false;
    endswitch;
}

/**
 * Retirar caracteres especial
 */
function caracterEspecial($nome_imagem) {
        // substituir os caracteres especiais
        $original = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $substituir = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';

        $nome_imagem_es = strtr(
            mb_convert_encoding($nome_imagem, 'ISO-8859-1', 'UTF-8'), 
            mb_convert_encoding($original, 'ISO-8859-1', 'UTF-8'), 
            $substituir
        );

            // Substituir o espaço em branco pelo traço:
            $nome_imagem_br = str_replace(' ', '-', $nome_imagem_es);

            $nome_imagem_tr = str_replace(array('----', '---', '--'), '-', $nome_imagem_br);

            // converter para minusculo:
            $nome_imagem_mi = strtolower($nome_imagem_tr);

            return $nome_imagem_mi;
}