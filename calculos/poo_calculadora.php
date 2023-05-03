<?php

require_once '../Class/Calculo.php';

$numero1 = '';
$numero2 = '';
$numero3 = '';
$res = '';

if (isset($_POST['btn_calcular'])) {

    $numero1 = $_POST['num1'];
    $numero2 = $_POST['num2'];
    $op = $_POST['operacao'];

    $objcalc = new Calculo();

    $res = $objcalc->CalcularCalculadora($numero1, $numero2, $op);
}   $selOp = "-";
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
    <div class="card-body">
        <form action="poo_calculadora.php" method="post">
            <div class="col-md-12">
                <label>Número 1:</label>
                <input name="num1" value="<?= isset($numero1) ? $numero1 : '' ?>">
                <select name="operacao">
                    <option value="x" selected="<?= isset($selOp) ? $selOp : 0 ?>">Multiplicar</option>
                    <option value="/" selected="<?= isset($selOp) ? $selOp : 0 ?>">Dividir</option>
                    <option value="-" selected="<?= isset($selOp) ? $selOp : 0 ?>">Subtrair</option>
                    <option value="+" selected="<?= isset($selOp) ? $selOp : 0 ?>">Somar</option>
                </select>
                <label>Número 2:</label>
                <input name="num2" value="<?= isset($numero2) ? $numero2 : '' ?>">
                <button name="btn_calcular" class="btn btn-primary">Calcular</button>
                <label>Resultado:</label>
                <input value="<?= isset($res) ? $res : '' ?>" disabled class="bg-info"></input><br><br>
            </div>
        </form>
    </div>
</body>

</html>