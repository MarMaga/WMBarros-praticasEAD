<?php

include_once '../partes/_head.php';
include_once '../funcao/funcoes.php';
include_once '../funcao/fnc2.php';

$erro = array();
for ($i = 0; $i < 10; $i++)
    $erro[] = '';

if (isset($_POST['btn_calcular'])) {

    $num = array();
    for ($i = 0; $i < 10; $i++) {
        $num[] = trim($_POST['n' . $i + 1]);
    }

    $errodigitacao = false;

    for ($i = 0; $i < 10; $i++) {
        if (!is_numeric(str_replace(",", ".", $num[$i]))) {
            #    echo 'Número ' . $i + 1 . ' inválido<br>';
            $errodigitacao = true;
            $cores[$i] = 'bg-danger';
            $erro[$i] = 'Número inválido';
        } else {
            $cores[$i] = 'bg-success';
            $erro[$i] = '';
        }
    }

    if (!$errodigitacao) {

        for ($i = 0; $i < 10; $i++) {
            $num[$i] = str_replace(",", ".", $num[$i]);
        }

        $result = Soma9DivUlt($num);

        for ($i = 0; $i < 10; $i++) {
            $num[$i] = str_replace(".", ",", $num[$i]);
        }
echo $result;
        if ($result == 0) {
            echo 'Preencher TODOS os campos<hr>';
        } elseif ($result == 'div0') {
            $erro[9] = 'Impossível dividir por zero';
        } else {
            $resultado = str_replace(".", ",", $result);
        }
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
    <form action="funcao_ex4.php" method="post">
        <div class="col-md-12">
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <?php if ($i < 9) { ?>
                    <label>Número
                        <?= $i + 1 ?>: (+)
                    </label>
                <?php } else { ?>
                    <label>Número
                        <?= $i + 1 ?>: (/)
                    </label>
                <?php } ?>
                <input name="<?= 'n' . $i + 1 ?>" value="<?= isset($num[$i]) ? $num[$i] : '' ?>"
                    class="<?= isset($cores[$i]) ? $cores[$i] : 'bg-light' ?>">
                <?php if ($erro[$i] == '') { ?>
                    <input disabled type="text" style="border: none; background-color: white; color: red;" value=""><br>
                <?php } else { ?>
                    <input disabled type="text" style="border: none; background-color: white; color: red;"
                        value="<?= isset($erro[$i]) ? $erro[$i] : '' ?>"><br>
                <?php } ?>
            <?php } ?>
            <br>
            <button name="btn_calcular">Calcular</button><br><br>
            <label>Resultado:</label>
            <input value="<?= isset($resultado) ? $resultado : '' ?>" disabled class="bg-info"></input>
        </div>
    </form>
</body>

</html>