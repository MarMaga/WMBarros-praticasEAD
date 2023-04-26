<?php

function CalculaValorVenda($valor,$qtd){

    if (empty($valor) || empty($qtd)){
        return 0;
    }
    $valorVenda = $valor * $qtd;
    return $valorVenda;
}

?>