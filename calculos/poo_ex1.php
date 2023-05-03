<?php

require_once '../Class/Combustivel.php';


if (isset($_POST['btn_calcular'])) {

    $tipo = $_POST['tipo'];
    $quant = $_POST['quant'];

    $objComb = new Combustivel();

    $res = $objComb->CalcularTotalLitros($tipo,$quant);

    if ($res == 0){
        echo '<center><br>Preencher TODOS os campos</center><hr>';
        $res = '';
    } else {
        $res = number_format($res,2,",",".");
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
    <div class="card-body">
        <form action="poo_ex1.php" method="post">
            <div class="col-md-12">
                <label>Tipo de combustível:</label>
                <select name="tipo">
                    <option value="1" <?= isset($tipo) ? ($tipo == 1 ? "selected" : "") : "" ?>">1 - Etanol</option>
                    <option value="2" <?= isset($tipo) ? ($tipo == 2 ? "selected" : "") : "" ?>">2 - Gasolina</option>
                </select>
                <br><br>
                <label>Quantidade de litros desejado:</label>
                <input name="quant" value="<?= isset($quant) ? $quant : '' ?>">
                <br><br>
                <button name="btn_calcular" class="btn btn-primary">Calcular total</button>
                <br><br>
                <label>Valor total:</label>
                <input value="<?= isset($res) ? $res : '' ?>" disabled class="bg-info"></input><br><br>
            </div>
        </form>
    </div>
</body>

</html>