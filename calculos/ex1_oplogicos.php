<?php

$v1 = ''; $v2 = ''; $v3 = ''; $v4 = ''; $v5 = '';
$resultado = '';

if(isset($_POST['btn_calcular'])){
    $v1 = $_POST['v1'];
    $v2 = $_POST['v2'];
    $v3 = $_POST['v3'];
    $v4 = $_POST['v4'];
    $v5 = $_POST['v5'];

    $resultado = ($v1 * $v2) + ($v3 * $v4 * $v5);

    if($resultado > 100){
        echo 'ACIMA de 100';
    } elseif($resultado < 100){
        echo 'ABAIXO de 100';
    } else {
        echo 'IGUAL a 100';
    }
}

if(isset($_POST['btn_limpar'])){
    $v1 = $v2 = $v3 = $v4 = $v5 = $resultado = '';
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
    <form action="ex1_oplogicos.php" method="POST">
        <label>Valor 1:</label>
        <input name="v1" value="<?= $v1 ?>"><br><br>
        <label>Valor 2:</label>
        <input name="v2" value="<?= $v2 ?>"><br><br>
        <label>Valor 3:</label>
        <input name="v3" value="<?= $v3 ?>"><br><br>
        <label>Valor 4:</label>
        <input name="v4" value="<?= $v4 ?>"><br><br>
        <label>Valor 5:</label>
        <input name="v5" value="<?= $v5 ?>"><br><br>
        <button name="btn_calcular">Multiplicar</button>
        <button name="btn_limpar">Limpar</button>
        <hr>
        <label>Resultado:</label>
        <input value="<?= $resultado ?>" disabled><br>
    </form>
</body>

</html>