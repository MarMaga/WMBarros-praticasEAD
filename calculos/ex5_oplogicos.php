<?php

$peso = '';
$altura = '';
$imc = '';

if (isset($_POST['btn_calcular'])) {

    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $imc = $peso / ($altura/100 * $altura/100);

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
        <label>Altura (cm):</label>
        <input name="altura" value="<?= $altura ?>"><br><br>
        <button name="btn_calcular">Calcular IMC</button>
        <input value="<?= $imc ?>" disabled>
    </form>
</body>

</html>