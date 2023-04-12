<?php

$peso = '';
$altura = '';
$imc = '';

if (isset($_POST['btn_calcular'])) {

    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    if(str_contains($peso,",")){
        $peso = str_replace(",",".",$peso);
    }

    if(str_contains($altura, ",")){
        $altura = str_replace(",",".",$altura);
    }

    if(!str_contains($altura,",")){
        $altura = substr($altura, 0,1) . '.' . substr($altura,1,strlen($altura));
    }

    $imc = $peso / ($altura * $altura);

    if(str_contains($peso,".")){
        $peso = str_replace(".",",",$peso);
    }

    if(str_contains($altura,".")){
        $altura= str_replace(".",",",$altura);
    }

    $imc = number_format($imc,2);

    if ($imc <= 20) {
        echo 'Magro' . '<hr>';
    } elseif ($imc <= 25) {
        echo 'Peso ideal' . '<hr>';
    } elseif ($imc <= 30) {
        echo 'Obeso' . '<hr>';
    } else {
        echo 'Muito obeso' . '<hr>';
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
    <form action="ex5_oplogicos.php" method="POST">
        <label>Peso:</label>
        <input name="peso" value="<?= $peso ?>"><br><br>
        <label>Altura:</label>
        <input name="altura" value="<?= $altura ?>"><br><br>
        <button name="btn_calcular">Calcular IMC</button>
        <input value="<?= $imc ?>" disabled>
    </form>
</body>

</html>