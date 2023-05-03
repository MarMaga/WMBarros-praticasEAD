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
        if (trim($n1) == '' || trim($n2) == '' || $operacao == '') {
            return 0;
        }

        $resultado = '';

        switch ($operacao) {
            case 'x':
                $resultado = $this->Multiplicar($n1, $n2);
                break;
            case '/':
                $resultado = $this->Dividir($n1, $n2);
                break;
            case '+':
                $resultado = $this->Somar($n1, $n2);
                break;
            case '-':
                $resultado = $this->Subtrair($n1, $n2);
                break;
        }

        return $resultado;
    }

    private function Somar($n1, $n2)
    {
        $res = $n1 + $n2;
        return $res;
    }

    private function Dividir($n1, $n2)
    {
        $res = $n1 / $n2;
        return $res;
    }

    private function Multiplicar($n1, $n2)
    {
        $res = $n1 * $n2;
        return $res;
    }

    private function Subtrair($n1, $n2)
    {
        $res = $n1 - $n2;
        return $res;
    }

}
?>