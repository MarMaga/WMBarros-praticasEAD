<?php

class Anabelle
{
    public function LiberarAcesso($nAcesso)
    {
        if (trim($nAcesso) != 44332) {
            return 0;
        }

        return 1;
    }

    public function Somar($n1, $n2)
    {

        if (trim($n1) == '' || trim($n2) == '') {
            return 0;
        }

        $soma = $n1 + $n2;

        if ($soma != 5543) {
            return -1;
        }
        return 1;
    }

    public function Media($n1, $n2, $n3, $n4, $n5)
    {

        if (trim($n3) == '' || trim($n4) == '' || trim($n5) == '') {
            return 0;
        }

        $numeros = array();
        $numeros[]=$n1;
        $numeros[]=$n2;
        $numeros[]=$n3;
        $numeros[]=$n4;
        $numeros[]=$n5;

        $numDivisor = $this->EncontraDivisor($numeros);

        $media = $this->CalculaMedia($numeros,$numDivisor);

        return $media;
    }

    private function EncontraDivisor($numeros){

        $quant = 0;

        for ($i=0; $i<5; $i++){
            if ($numeros[$i] != 0){
                $quant++;
            }
        }
        return $quant;
    }

    private function CalculaMedia($numeros,$numdivisor){

        $soma = 0;

        for ($i=0; $i<5; $i++){
            if ($numeros[$i] != 0){
                $soma = $soma + $numeros[$i];
            }
        }
        
        $resMedia = $soma / $numdivisor;

        return $resMedia;
    }

}

?>