<?php
require_once 'funcoes.php';

$meses = array();
$meses[] = 'OUT';
$meses[] = 'NOV';
$meses[] = 'DEZ';

if (isset($_POST['btn_calcular'])) {

    $vendas = $descontos = $vendasliq = array();

    for ($i = 0; $i < 3; $i++) {
        $vendas[] = str_replace(",", ".", trim($_POST['vm' . $i + 1]));
        $descontos[] = str_replace(",", ".", trim($_POST['dm' . $i + 1]));
    }

    echo AjustaCasasDecimais($vendas[0],2) . '<br>';
    $errodigitacao = False;

    for ($i = 0; $i < 3; $i++) {
        if (!is_numeric($vendas[$i])) {
            echo "Digite um valor de vendas do mês $meses[$i] válido";
            $errodigitacao = True;
            break;
        } elseif ($vendas[$i] == '' or $vendas[$i] < 0) {
            echo "Digite um valor positivo para as vendas do mês $meses[$i]";
            $errodigitacao = True;
            break;
        } elseif (!is_numeric($descontos[$i])) {
            echo "Digite uma porcentagem de desconto do mês $meses[$i] válida";
            $errodigitacao = True;
            break;
        } elseif ($descontos[$i] < 0 && $descontos[$i] != '') {
            echo "Não é permitida porcentagem de desconto negativa. Corrija o desconto do mês $meses[$i]";
            $errodigitacao = True;
            break;
        }
    }

    if (!$errodigitacao) {
        for ($i = 0; $i < 3; $i++) {

            if ($descontos[$i] != '' && $descontos[$i] != 0) {
                $vendasliq[] = $vendas[$i] - ($vendas[$i] * $descontos[$i] / 100);
            } else $vendasliq[] = $vendas[$i];

            echo 'Venda líquida do mês ' . $meses[$i] . ': R$ ' . number_format($vendasliq[$i], 2, ",", ".") . '<br><br>';
            
            // volta as vírgulas originais que foram substituídas por pontos para os cálculos
            if(str_contains($vendas[$i],".")) $vendas[$i] = str_replace(".",",",$vendas[$i]);
            if(str_contains($descontos[$i],".")) $descontos[$i] = str_replace(".",",",$descontos[$i]);
        }
    }

    echo '<hr>';
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
    <form action="lacoscomarray7.php" method="post">
        <?php for ($i = 0; $i < 3; $i++) { ?>
            <label>Venda do mês <?= $meses[$i] ?>:</label>
            <input name="<?= 'vm' . $i + 1 ?>" value="<?= isset($vendas[$i]) ? $vendas[$i] : '' ?>">
            <label> % Descontos:</label>
            <input name="<?= 'dm' . $i + 1 ?>" value="<?= isset($descontos[$i]) ? $descontos[$i] : '' ?>"><br><br>
        <?php } ?>

        <button name="btn_calcular">Calcular</button>
    </form>
</body>

</html>