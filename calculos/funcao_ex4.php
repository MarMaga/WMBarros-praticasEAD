<?php

include_once '../funcao/funcoes.php';
include_once '../funcao/fnc2.php';

if (isset($_POST['btn_calcular'])) {


    $num = array();
    for ($i = 0; $i < 10; $i++) {
        $num[] = $_POST['n' . $i + 1];
    }

    $errodigitacao = false;

    for ($i = 0; $i < 10; $i++) {
        if (!is_numeric(str_replace(",",".",$num[$i]))) {
            echo 'Número ' . $i + 1 . ' inválido<br>';
            $errodigitacao = true;
            $cores[$i] = 'border-width: 1px; color: white; background-color: red;';
        } else $cores[$i] = 'border-width: 1px; color: white; background-color: green;';
    }

    if (!$errodigitacao) {
        for ($i = 0; $i < 10; $i++) {
            $num[$i] = str_replace(",",".",$num[$i]);
        }

        $result = Soma9Div1($num);

        for ($i = 0; $i < 10; $i++) {
            $num[$i] = str_replace(".",",",$num[$i]);
        }

        if ($result == 0) {
            echo 'Preencher TODOS os campos<hr>';
        } else {
            $resultado = str_replace(".",",",$result);
        }
    } else echo '<hr>';
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
    <form action="funcao_ex4.php" method="post">
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <label>Número
                <?= $i + 1 ?>:
            </label>
            <input name="<?= 'n' . $i + 1 ?>" value="<?= isset($num[$i]) ? $num[$i] : '' ?>" style="<?=isset($cores[$i]) ? $cores[$i] : 'border-width: 1px; color: black; background-color: white; border-color: grey;'?>"><br><br>
        <?php } ?>
        <button name="btn_calcular">Calcular</button><br><br>
        <label>Resultado:</label>
        <input value="<?= isset($resultado) ? $resultado : '' ?>" disabled style="border-width: 1px; color: black; border-color: black;"></input>
    </form>
</body>

</html>