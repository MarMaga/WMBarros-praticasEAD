<?php

class Calculo
{

    public function SomarNumeros($n1, $n2, $n3)
    {
        $soma = $n1 + $n2 + $n3;

        return $soma;
    }

    public function CalcularCalculadora($n1, $n2, $operacao)
    {
        if (trim($n1) == '' || trim($n2) == '' || $operacao == ''){
            return 0;
        }

        $resultado = '';

        if($operacao == 'x'){
            $resultado = $this->Multiplicar($n1,$n2);
        } elseif ($operacao == '/'){
            $resultado = $this->Dividir($n1,$n2);
        } elseif ($operacao == '+'){
            $resultado = $this->Somar($n1,$n2);
        } elseif ($operacao == '-'){
            $resultado = $this->Subtrair($n1,$n2);
        }

        return $resultado;
    }

    private function Somar($n1,$n2){
        $res = $n1 + $n2;
        return $res;
    }

    private function Dividir($n1,$n2){
        $res = $n1 / $n2;
        return $res;
    }

    private function Multiplicar($n1,$n2){
        $res = $n1 * $n2;
        return $res;
    }

    private function Subtrair($n1,$n2){
        $res = $n1 - $n2;
        return $res;
    }

}
?>