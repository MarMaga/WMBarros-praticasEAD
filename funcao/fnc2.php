<?php

function ValidaTamanhoCampo($campo,$tammin){

    if (strlen($campo) < $tammin || $tammin < 1){
        return false;
    }

    return true;
}

function ValidaCamposIguais($campo,$tammin,$campo2){

    if (strlen($campo) < $tammin || $tammin < 1 || trim($campo) != trim($campo2)){
        return False;
    }

    return True;
}

?>