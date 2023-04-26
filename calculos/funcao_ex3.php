<?php

include_once '../funcao/funcoes.php';
include_once '../funcao/fnc.php';
include_once '../funcao/fnc2.php';

if (isset($_POST['btn_calcular'])) {

    $nomeProduto = $_POST['nomeproduto'];
    $valorProduto = $_POST['valorproduto'];
    $qtdProduto = $_POST['qtdproduto'];

    # valida a digitação dos campos
    $errodigitacao = False;
    if (empty($nomeProduto) || is_numeric($nomeProduto) || strlen($nomeProduto) < 3) {
        echo 'Digite um nome válido<hr>';
        $errodigitacao = True;
    } elseif (!is_numeric(RemovePontoVirgula($valorProduto)) || $valorProduto < 0) {
        echo 'Digite um valor positivo válido<hr>';
        $errodigitacao = True;
    } elseif (!is_numeric(RemovePontoVirgula($qtdProduto))) {
        echo 'Digite uma quantidade positiva válida<hr>';
        $errodigitacao = True;
    }

    $valorProduto = AjustaCasasDecimais($valorProduto, 2);
    $qtdProduto = AjustaCasasDecimais($qtdProduto, 0);

    if (!$errodigitacao) {
        $valorVenda = CalculaValorVenda($valorProduto, $qtdProduto);

        if ($valorVenda == 0) {
            echo 'Preencha TODOS os campos<hr>';
         } else {
            echo "Valor da venda: R$ " . number_format($valorVenda, 2, ",", ".") . '<hr>';
            $valorProduto = number_format($valorProduto, 2, ",", ".");
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
    <form action="funcao_ex3.php" method="post">
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