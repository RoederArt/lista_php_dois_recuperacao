<?php

 function quant_carac($texto){
    $quantidade_carac = strlen($texto);

    return $quantidade_carac;
 }


 function quant_palavras($texto){
    $sep_palavras = explode(" ", $texto);

   $quantidade_palavras = count($sep_palavras);

   return $quantidade_palavras;
 }

 function quant_frases($texto){
    preg_match_all('/[.!?]+/', $texto, $frases);

    return count($frases[0]);
 }

 function maior_menor($texto){
    $maior = "";
    $menor = $texto[0];

    foreach ($texto as $palavra) {

        if (strlen($palavra) > strlen($maior)) {
            $maior = $palavra;
        }

        if (strlen($palavra) < strlen($menor)) {
            $menor = $palavra;
        }
 }

 return [
    "maior"=> $maior,
    "menor"=> $menor
 ];
}

function quant_repetidas($texto){
    $palavras = preg_split('/\s+/',strtolower(trim($texto)));

    $quant_palavras = array_count_values($palavras);

    $repetidas = 0;

    foreach ($quant_palavras as $quant_rep) {
        if ($quant_rep > 1){
            $repetidas++;
        }
    }

    return $repetidas;
}

function quant_repetidas5($texto){
    $palavras = preg_split('/\s+/',strtolower(trim($texto)));

    $quant_palavras = array_count_values($palavras);

    asort($quant_palavras);

    return array_slice($quant_palavras, 0, 5, true);
}

function espaco_duplo($texto){
    $sem_duplos = preg_replace('/\s+/', ' ',trim($texto));

    return $sem_duplos;
}

function formatado($texto){
    $texto_form = ucwords(($texto));

    return $texto_form;
}


function processarTexto($texto){

    $resultado = maior_menor($texto);
   echo "Quantidade de caracteres é de " . quant_carac($texto) . "<br>";
   echo "Quantidade de palavras é de " . quant_palavras($texto) . "<br>";
   echo "Quantidade de frases é de " . quant_frases($texto) . "<br>";
   echo "A maior palavra é ". $resultado["maior"] . "<br>";
   echo "A menor palavra é " . $resultado["menor"] . "<br>";

   echo "As 5 palavras mais frequente são: <br>";
    foreach (quant_repetidas5($texto) as $palavra => $quantidade) {
        echo "$palavra : $quantidade <br>";
    }
   ;

   echo "<br> O texto sem espaços duplos : " . espaco_duplo($texto) . "<br>";
   echo "O texto formatado : ". formatado($texto)."<br>";
}

$texto = "Ola me chamo arthur tenho 17 anos e estou estudando no colegio sesi de referencia e estou aprendendo a programar em php e estou gostando muito de aprender a programar em php";

processarTexto($texto);

?>