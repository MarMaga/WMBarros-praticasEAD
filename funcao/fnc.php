<?php

function CalculaValorVenda($valor,$qtd){

    if (empty($valor) || empty($qtd)){
        return 0;
    }
    $valorVenda = $valor * $qtd;
    return $valorVenda;
}

function CalculoArray($num)
{
    $soma3pri = floatval($num[0]) + floatval($num[1]) + floatval($num[2]);

    $resultado = Multiplica($soma3pri,$num[3],$num[4]);

    return $resultado;
}

function Multiplica($soma,$num4,$num5)
{
    return $soma * floatval($num4) * floatval($num5);
}

function CalculoVar($num1,$num2,$num3,$num4,$num5)
{
    $soma3pri = floatval($num1) + floatval($num2) + floatval($num3);

    $resultado = Multiplica($soma3pri,$num4,$num5);

    return $resultado;
}
?>