<?php

define('GASOLINA', 4.1);
const ETANOL = 3.09;

class Combustivel
{
    public function CalcularTotalLitros($tipo,$quant){

        if (trim($tipo) == '' || trim($quant) == '') return 0;

        if (trim($tipo) == '1') {
            $valorTotal = $quant * ETANOL;
        } else {
            $valorTotal = $quant * GASOLINA;
        }
        return $valorTotal;
    }
}

?>