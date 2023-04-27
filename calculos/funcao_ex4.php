<?php

include_once '../partes/_head.php';
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
            $cores[$i] = 'bg-danger';
        } else $cores[$i] = 'bg-success';
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
            <input name="<?= 'n' . $i + 1 ?>" value="<?= isset($num[$i]) ? $num[$i] : '' ?>" class="<?=isset($cores[$i]) ? $cores[$i] : 'bg-light'?>"><br>
        <?php } ?>
        <button name="btn_calcular">Calcular</button><br><br>
        <label>Resultado:</label>
        <input value="<?= isset($resultado) ? $resultado : '' ?>" disabled class="bg-info"></input>
    </form>
</body>

</html>