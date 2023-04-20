<?php

function VerificaDigitado($tipo, $conteudo){

if($tipo == '$'){

}elseif($tipo == '%'){
    
}


}

function AjustaCasasDecimais($campo,$qtd){

    $localPontoVirgula = 0;

    # encontra o local do ponto ou da vírgula a partir da esquerda
    for($i=strlen(trim($campo)); $i>=0; $i--){    
        if(substr($campo,$i,1) == '.' || substr($campo,$i,1) == ','){
            $localPontoVirgula = $i;
            break;
        }
    }
    if($localPontoVirgula > 0) $localPontoVirgula++;
    echo 'Local do ponto/virgula: ' . $localPontoVirgula . '<br>';    

    # remove qualquer outro ponto e vírgula à esquerda do $localPontoVirgula
    $esqDoCampo = substr($campo,0,$localPontoVirgula-1);
    echo "Esquerda do campo: $esqDoCampo<br>";
    $esqSoNum = '';
    for($i=0; $i<=$localPontoVirgula-1; $i++){
        if(is_numeric(substr($esqDoCampo,$i,1))){
            $esqSoNum = $esqSoNum . substr($esqDoCampo,$i,1);
    }
    echo "Esquerda só números: $esqSoNum <br>";

    if($qtd > 0){
        # se não tem ponto decimal
        if($localPontoVirgula == 0){
            # inclui o ponto decimal antes de inserir os zeros que faltam
            $esqSoNum = $esqSoNum . '.';
        }

        $qtdCasasDecimais = 0;

        if($localPontoVirgula > 0){
            # encontra a quantidade de casas decimais de $campo
            $qtdCasasDecimais = strlen($campo) - $localPontoVirgula;
        }
        echo 'Quantidade casas decimais: ' . $qtdCasasDecimais . '<br>';

        if($qtdCasasDecimais < $qtd){
            for($i=$qtdCasasDecimais; $i<$qtd; $i++){
                $esqSoNum = $esqSoNum . '0';
            }
        }else{
            $campo = $esqSoNum . substr($campo,$localPontoVirgula,2);
        }
    }

    return $campo;
}
}

function ContaPontos($campo){

    $qtdPontos = 0;

    for($i=0; $i<=strlen(trim($campo)); $i++){
        if(substr($campo,$i,1) == '.') $qtdPontos++;
    }

    return $qtdPontos;
}

function ContaVirgulas($campo){

    $qtdVirgulas = 0;

    for($i=0; $i<=strlen(trim($campo)); $i++){
        if(substr($campo,$i,1) == '.') $qtdVirgulas++;
    }

    return $qtdVirgulas;
}

function RemoveLetras($campo){
    
    $campo = trim($campo);
    $campolimpo = '';

    for($i=0; $i<=strlen($campo)-1; $i++){
        if(is_numeric(substr($campo,$i,1))){
            $campolimpo = $campolimpo . substr($campo,$i,1);
        }
    }

    return $campolimpo;
}

?>