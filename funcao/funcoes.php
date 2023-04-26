<?php

function RemovePontoVirgula($campo){
    $campo = str_replace(",","",$campo);
    $campo = str_replace(".","",$campo);
    return $campo;
}

function EncontraPrimeiroPontoVirgula($campo)
{
    $localPontoVirgula = 0;
    for ($i = strlen(trim($campo)); $i >= 0; $i--) {
        if (substr($campo, $i, 1) == '.' || substr($campo, $i, 1) == ',') {
            $localPontoVirgula = $i;
            break;
        }
    }
    return $localPontoVirgula;
}

function AjustaCasasDecimais($campo, $qtd)
{
    # $campo: o campo a ser ajustado
    # $qtd: o número de casas decimais para ajustar em $campo
    # verifica se existe ponto decimal em $campo, mantém apenas os números e o ponto decimal, se $qtd > 0

    $localPontoVirgula = 0;

    # encontra o local do primeiro ponto/vírgula a partir da direita
    # se não encontrar, EncontraPrimeiroPontoVirgula retornará zero
    $localPontoVirgula = EncontraPrimeiroPontoVirgula($campo);

    # só remove o último caracter se o tamanho de $campo for maior que 1
    # porque EncontraPrimeiroPontoVirgula retornará zero que, somado a 1, será igual ao tamanho de $campo
    if (strlen($campo) > 1) {
        # enquanto encontrar ponto/vírgula na última posição (mais à direita), remove
        while ($localPontoVirgula + 1 == strlen($campo)) {

            $campo = substr($campo, 0, strlen($campo) - 1);

            # encontra o local do primeiro ponto/vírgula a partir da direita do novo $campo
            $localPontoVirgula = EncontraPrimeiroPontoVirgula($campo);
        }
    }

    # se encontrou ponto/vírgula, tem ponto decimal
    if ($localPontoVirgula > 0) {
        # como substr considera o primeiro caracter como zero, adiciona 1 para tratar da posição real
        $localPontoVirgula++;
    }

    # se não tem ponto decimal, o que foi digitado deve ser incluído em $esqDoCampo
    if ($localPontoVirgula == 0) {
        $esqDoCampo = $campo;

        // # remove qualquer outro ponto/vírgula de $esqDoCampo
        // $esqSoNum = '';
        // for ($i = 0; $i <= strlen($esqDoCampo); $i++) {
        //     if (is_numeric(substr($esqDoCampo, $i, 1))) {
        //         $esqSoNum = $esqSoNum . substr($esqDoCampo, $i, 1);
        //     }
        // }
    } else { # se tem ponto decimal, deve lançar em $esqDoCampo apenas o que está à esquerda do ponto decimal
        $esqDoCampo = substr($campo, 0, $localPontoVirgula - 1);

        # remove qualquer outro ponto/vírgula de $esqDoCampo
        $esqSoNum = '';
        for ($i = 0; $i <= $localPontoVirgula - 1; $i++) {
            if (is_numeric(substr($esqDoCampo, $i, 1))) {
                $esqSoNum = $esqSoNum . substr($esqDoCampo, $i, 1);
            }
        }
    }

    # se não deve ter casas decimais
    if ($qtd == 0) {
        return $esqSoNum;
    } else { # se deve ter casas decimais

        # remove qualquer outro ponto e vírgula à direita do $localPontoVirgula
        $dirDoCampo = substr($campo, $localPontoVirgula, strlen($campo));
        $dirSoNum = '';
        for ($i = 0; $i <= $localPontoVirgula - 1; $i++) {
            if (is_numeric(substr($dirDoCampo, $i, 1))) {
                $dirSoNum = $dirSoNum . substr($dirDoCampo, $i, 1);
            }
        }

        # se é para ter ponto decimal
        if ($qtd > 0) {
            # inclui o ponto decimal antes de inserir os zeros que faltam
            $esqSoNum = $esqSoNum . '.';
        }

        $qtdCasasDecimais = strlen($dirSoNum);

        if ($qtdCasasDecimais < $qtd) {
            for ($i = $qtdCasasDecimais; $i < $qtd; $i++) {
                $dirSoNum = $dirSoNum . '0';
            }
        } elseif ($qtdCasasDecimais > $qtd) {
            $dirSoNum = substr($dirSoNum, 0, $qtd);
        }

        $campo = $esqSoNum . $dirSoNum;

        return $campo;
    }
}
