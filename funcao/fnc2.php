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

function Soma9Div1($n1, $n2, $n3, $n4, $n5, $n6, $n7, $n8, $n9, $n10)
{
    for ($i = 1; $i < 11; $i++) {
        if (empty('$n' . $i)) {
            return 0;
        }
         
        '$n' . $i = strval('$n' . $i);
    }

    return ($n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $n7 + $n8 + $n9) / $n10;
}
?>