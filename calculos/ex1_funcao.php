<?php

include_once '../funcao/funcoes.php';
include_once '../funcao/fnc.php';

if (isset($_POST['btn_calcular'])) {

    $nomeProduto = $_POST['nomeproduto'];
    $valorProduto = $_POST['valorproduto'];
    $qtdProduto = $_POST['qtdproduto'];

    # valida a digitação dos campos
    $errodigitacao = False;
    if (empty($nomeProduto) || is_numeric($nomeProduto) || strlen($nomeProduto) < 3){
        echo 'Digite um nome válido<hr>';
        $errodigitacao = True;
     }elseif (!is_numeric(RemovePontoVirgula($valorProduto))){
        echo 'Digite um valor positivo<hr>';
        $errodigitacao = True;
    }elseif (!is_numeric(RemovePontoVirgula($qtdProduto))){
        echo 'Digite uma quantidade positiva<hr>';
        $errodigitacao = True;
    }

    if (!$errodigitacao){
        $valorVenda = CalculaValorVenda($valorProduto,$qtdProduto);

        if ($valorVenda == 0){
            echo 'Erro no uso de função<hr>';
            exit;
        }else{
            echo "Valor da venda: $valorVenda" . '<hr>';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="ex1_funcao.php" method="post">
        <label>Nome do produto:</label>
        <input name="nomeproduto" value="<?= isset($nomeProduto) ? $nomeProduto : '' ?>"><br><br>
        <label>Valor:</label>
        <input name="valorproduto" value="<?= isset($valorProduto) ? $valorProduto : '' ?>"><br><br>
        <label>Quantidade:</label>
        <input name="qtdproduto" value="<?= isset($qtdProduto) ? $qtdProduto : '' ?>"><br><br>
        <button name="btn_calcular">Calcular</button>
    </form>
</body>

</html>