<?php

class Painel
{
    public function Validar($grupo)
    {
        if (trim($grupo) == '') {
            return false;
        }
        return true;
    }

    public function Testar($grupo, $parametros)
    {
        $parametroInicial = explode('|', $parametros)[0];
        $parametroFinal = explode('|', $parametros)[1];
        $parametroMeio = ($parametroFinal + $parametroInicial) / 2;

        if ($grupo < $parametroInicial) {
            return -1;
        } else if ($grupo > $parametroFinal) {
            return +1;
        } else if ($grupo == $parametroMeio) {
            return 0;
        } else {
            return 'OK';
        }
    }

}

?>