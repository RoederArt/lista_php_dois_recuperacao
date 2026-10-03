<?php

function letras_mai($senha){
    preg_match_all('/\p{Lu}/u', $senha, $matches);
    $quantidade_mai = $matches[0];

    return $quantidade_mai;
}

function letras_min($senha){
    preg_match_all('/\p{Ll}/u', $senha, $matches);
    $quantidade_min = $matches[0];

    return $quantidade_min;
}

function quant_numeros($senha){

    $troca_nums = preg_replace('/[^0-9]/','', $senha);

    $quantidade_numeros = strlen($troca_nums);

    return $quantidade_numeros;
}

function quant_carac_especiais($senha){
    preg_match_all('/[^\p{L}\p{N}\s]/u', $senha, $matches);
    $quantidade_carac_especiais = $matches[0];

    return $quantidade_carac_especiais;
}

function verif_senha($senha){
    $tamanho_senha =  mb_strlen($senha);
    $result_mai = letras_mai($senha);
    $result_min = letras_min($senha);
    $result_num = quant_numeros($senha);
    $result_esp = quant_carac_especiais($senha);
    $nivel = 0;

    if (mb_strlen($senha) >= 8) $nivel++;
    if (letras_mai($senha) > 0) $nivel++;
    if (letras_min($senha) > 0) $nivel++;
    if (quant_numeros($senha) > 0) $nivel++;
    if (quant_carac_especiais($senha) > 0) $nivel++;

    if ($nivel = 1) return 'É uma senha Fraca';
    if ($nivel = 2) return 'É uma senha Média';
    if ($nivel = 3) return 'É uma senha Forte';
    if ($nivel = 4) return 'É uma senha Muito Forte';
}

$senha = '1223@Mne';

echo verif_senha($senha);

?>