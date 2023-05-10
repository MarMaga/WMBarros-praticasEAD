<?php

require_once '../Class/anab.php';

$nAcessoEnabled = '';
$btnAcessoEnabled = '';
$n1Enabled = 'disabled';
$n2Enabled = 'disabled';
$btnSomaEnabled = 'disabled';
$n3Enabled = 'disabled';
$n4Enabled = 'disabled';
$n5Enabled = 'disabled';
$btnMediaEnabled = 'disabled';

if (isset($_POST['btn_liberar'])) {

    $nAcesso = $_POST['nAcesso'];

    $objAnab = new Anabelle();

    $ret = $objAnab->LiberarAcesso($nAcesso);

    if ($ret == 0) {
        echo 'Número inválido<hr>';
    } else {
        # desativa o input Acesso e o botão Liberar Acesso
        $nAcessoEnabled = 'readonly';
        $btnAcessoEnabled = 'disabled';
        # ativa n1, n2 e o botão Somar
        $n1Enabled = '';
        $n2Enabled = '';
        $btnSomaEnabled = '';
    }
}

if (isset($_POST['btn_somar'])) {

    $nAcesso = $_POST['nAcesso'];
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $nAcessoEnabled = 'readonly';
    $btnAcessoEnabled = 'disabled';

    $objAnab = new Anabelle();

    $ret = $objAnab->Somar($n1, $n2);

    switch ($ret) {
        case 0:
            echo 'Digite os dois números<hr>';
            break;
        case -1:
            echo 'Soma dos números incorreta<hr>';

            $n1Enabled = '';
            $n2Enabled = '';
            $btnSomaEnabled = '';
            $n3Enabled = 'disabled';
            $n4Enabled = 'disabled';
            $n5Enabled = 'disabled';
            $btnMediaEnabled = 'disabled';
            break;
        case 1:
            $n1Enabled = 'readonly';
            $n2Enabled = 'readonly';
            $btnSomaEnabled = 'disabled';
            $n3Enabled = '';
            $n4Enabled = '';
            $n5Enabled = '';
            $btnMediaEnabled = '';
            break;
    }
}

if (isset($_POST['btn_media'])) {

    $nAcesso = $_POST['nAcesso'];
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];
    $n4 = $_POST['n4'];
    $n5 = $_POST['n5'];
    $nAcessoEnabled = 'readonly';
    $btnAcessoEnabled = 'disabled';
    $n1Enabled = 'readonly';
    $n2Enabled = 'readonly';
    $btnSomaEnabled = 'disabled';
    $n3Enabled = '';
    $n4Enabled = '';
    $n5Enabled = '';
    $btnMediaEnabled = '';

    $objAnab = new Anabelle();

    $ret = $objAnab->Media($n1, $n2, $n3, $n4, $n5);

    if ($ret == 0) {
        echo 'Digite os três números<hr>';
    }

    $media = number_format($ret,0,"",".");
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
    <form action="anabelle.php" method="post">
        <label>Digite o número de acesso:</label>
        <input name="nAcesso" value="<?= isset($nAcesso) ? $nAcesso : '' ?>" <?= $nAcessoEnabled ?>>
        <br><br>
        <button name="btn_liberar" <?= $btnAcessoEnabled ?>>Liberar acesso</button>
        <hr>
        <label>Digite o número 1:</label>
        <input name="n1" value="<?= isset($n1) ? $n1 : '' ?>" <?= $n1Enabled ?>>
        <br><br>
        <label>Digite o número 2:</label>
        <input name="n2" value="<?= isset($n2) ? $n2 : '' ?>" <?= $n2Enabled ?>>
        <br><br>
        <button name="btn_somar" <?= $btnSomaEnabled ?>>Somar</button>
        <hr>
        <label>Digite o número 3:</label>
        <input name="n3" value="<?= isset($n3) ? $n3 : '' ?>" <?= $n3Enabled ?>>
        <br><br>
        <label>Digite o número 4:</label>
        <input name="n4" value="<?= isset($n4) ? $n4 : '' ?>" <?= $n4Enabled ?>>
        <br><br>
        <label>Digite o número 5:</label>
        <input name="n5" value="<?= isset($n5) ? $n5 : '' ?>" <?= $n5Enabled ?>>
        <br><br>
        <button name="btn_media" <?= $btnMediaEnabled ?>>Calcular média</button>
        <hr>
        <input name="media" value="<?= isset($media) ? $media : '' ?>" disabled>
    </form>
</body>

</html>