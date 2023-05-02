<?php

include_once '../partes/_head.php';
include_once '../funcao/funcoes.php';

if (isset($_POST['btn_calcular'])){
    #-------------------------------------------------------------------------
    # lógica com uso de array
    $num = array();
    for ($i=0; $i<5; $i++) $num[] = $_POST['n' . $i+1];

    $resArray = CalculoArray($num);    
    
    if ($resArray == 0){
        echo 'Preencher TODOS os campos<hr>';
        unset($resArray);
    }

    #-------------------------------------------------------------------------
    # lógica com uso de variáveis, não array
    $num1 = $_POST['n1'];
    $num2 = $_POST['n2'];
    $num3 = $_POST['n3'];
    $num4 = $_POST['n4'];
    $num5 = $_POST['n5'];

    $resVar = CalculoVar($num1,$num2,$num3,$num4,$num5);

    if ($resVar == 0){
        echo 'Preencher TODOS os campos<hr>';
        unset($resVar);
    }
    #-------------------------------------------------------------------------
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
        <form action="funcao_ex6.php" method="post">
            <div class="col-md-12">
                <?php for ($i=0; $i<5; $i++) { ?>
                    <label>Número <?= $i + 1 ?>:</label>
                    <input name="<?= 'n' . $i + 1 ?>" value="<?= isset($num[$i]) ? $num[$i] : '' ?>"><br><br>
                <?php } ?>
                <button name="btn_calcular" class="btn btn-primary">Calcular</button><br><br>
                <label>Resultado com array:</label>
                <input value="<?= isset($resArray) ? $resArray : '' ?>" disabled class="bg-info"></input><br><br>
                <label>Resultado com variáveis:</label>
                <input value="<?= isset($resVar) ? $resVar : '' ?>" disabled class="bg-info"></input>
            </div>
        </form>
    </div>
</body>

</html>
