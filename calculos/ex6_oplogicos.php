<?php

$salario = '';

if(isset($_POST['btn_calcular'])){

    $salario = $_POST['salario'];
    $salario = str_replace(",",".",$salario);
    
    $aumento15 = $salario * 0.15;
    $novo15 = $salario + $aumento15;

    $aumento18 = $salario * 0.18;
    $novo18 = $salario + $aumento18;

    $totalaumento = $aumento15 + $aumento18;
    $totalnovo = $salario + $aumento15 + $aumento18;

    echo 'Aumento de 15% do salário: R$ ' . number_format($aumento15,2,",",".") . '<br>';
    echo 'Aumento de 18% do salário: R$ ' . number_format($aumento18,2,",",".") . '<br>';
    echo 'Total de aumento: R$ ' . number_format($totalaumento,2,",",".") . '<br>';
    echo 'Novo salário: R$ ' . number_format($totalnovo,2,",",".") . '<hr>';

    if ($totalaumento <= 100){
        echo 'Aumento RUIM' . '<hr>';
    } elseif ($totalaumento <=200){
        echo 'Aumento RAZOÁVEL' . '<hr>';
    } elseif ($totalaumento <=300){
        echo 'Aumento BOM' . '<hr>';
    } elseif ($totalaumento <=400){
        echo 'Aumento ÓTIMO' . '<hr>';
    } else {
        echo 'Aumento EXCELENTE' . '<hr>';
    }
}

if (isset($_POST['btn_limpar'])){
    $salario = '';
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
    <form action="ex6_oplogicos.php" method="POST">
        <label>Salário:</label>
        <input name="salario" value="<?= $salario ?>"><br><br>
        <button name="btn_calcular">Calcular</button>
        <button name="btn_limpar">Limpar</button>
    </form>
</body>

</html>