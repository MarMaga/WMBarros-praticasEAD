<?php

function ValidaTamanhoCampo($campo, $tammin)
{

    if (strlen($campo) < $tammin || $tammin < 1) {
        return false;
    }
    return true;
}

function ValidaCamposIguais($campo, $tammin, $campo2)
{

    if (strlen($campo) < $tammin || $tammin < 1 || trim($campo) != trim($campo2)) {
        return False;
    }
    return True;
}

// function Soma9Div1($n1, $n2, $n3, $n4, $n5, $n6, $n7, $n8, $n9, $n10)
// {
//     for ($i = 1; $i < 11; $i++) {
//         if (empty('$n' . $i)) {
//             return 0;
//         }

//         '$n' . $i = strval('$n' . $i);
//     }

//     return ($n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $n7 + $n8 + $n9) / $n10;
// }

function Soma9DivUlt($numeros)
{
    for ($i = 0; $i < 10; $i++) {
        if ($numeros[$i] == '') return 0;
        if ($numeros[9] == 0) return 'div0';
    }
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma = $soma + $numeros[$i];
    }

    return $soma / $numeros[9];
}

?>