<?php

function VerificaDigitado($tipo, $conteudo){

if($tipo == '$'){

}elseif($tipo == '%'){
    
}


}

function RemoveLetras($campo){
    
    $campo = trim($campo);
    $campolimpo = '';

    for($i=0; $i=strlen($campo)-1; $i++){
        if(is_numeric(substr($campo,$i+1,1))){
            $campolimpo = $campolimpo . substr($campo,$i+1,1);
        }
    }

    return $campolimpo;
}

?>