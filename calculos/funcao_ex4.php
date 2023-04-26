<?php

include_once '../funcao/fnc2.php';

if (isset($_POST['btn_calcular'])) {


    $num = array();
    for ($i = 0; $i < 10; $i++) {
        $num[] = $_POST['n' . $i + 1];
    }
    $soma = Soma9Div1($num[0], $num[1], $num[2], $num[3], $num[4], $num[5], $num[6], $num[7], $num[8], $num[9]);

    if ($soma == 0) {
        echo 'Preencher TODOS os números<hr>';
    } else {
        echo "A soma dos 9 primeiros números dividida pelo último número é $soma<hr>";
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
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <label>Número
                <?= $i + 1 ?>:
            </label>
            <input name="<?= 'n' . $i + 1 ?>" value="<?= isset($num[$i]) ? $num[$i] : '' ?>"><br><br>
        <?php } ?>
        <button name="btn_calcular">Calcular</button>
    </form>
</body>

</html>