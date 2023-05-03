<?php

require_once '../Class/Calculo.php';

$numero1 = '';
$numero2 = '';
$numero3 = '';
$res = '';

if (isset($_POST['btn_somar'])){

    $numero1 = $_POST['num1'];
    $numero2 = $_POST['num2'];
    $numero3 = $_POST['num3'];

    $objcalculo = new Calculo();

    $res = $objcalculo->SomarNumeros($numero1,$numero2,$numero3);

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
        <form action="poo_exemplo.php" method="post">
            <div class="col-md-12">
                <label>Número 1:</label>
                <input name="num1" value="<?= isset($numero1) ? $numero1 : '' ?>"><br><br>
                <label>Número 2:</label>
                <input name="num2" value="<?= isset($numero2) ? $numero2 : '' ?>"><br><br>
                <label>Número 3:</label>
                <input name="num3" value="<?= isset($numero3) ? $numero3 : '' ?>"><br><br>
                <button name="btn_somar" class="btn btn-primary">Somar</button><br><br>
                <label>Resultado:</label>
                <input value="<?= isset($res) ? $res : '' ?>" disabled class="bg-info"></input><br><br>
            </div>
        </form>
    </div>
</body>

</html>
