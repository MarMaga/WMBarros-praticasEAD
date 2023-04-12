<?php

$vi = '';
$vm = '';
$vf = '';
$meioVm = '';
$resultado = '';

if (isset($_POST['btn_verificar'])) {

    $vi = $_POST['vi'];
    $vm = $_POST['vm'];
    $vf = $_POST['vf'];

    $meioVm = $vm / 2;

    if ($vi > $vf) {
        $vtemp = $vf;
        $vf = $vi;
        $vi = $vtemp;
    }

    if ($meioVm >= $vi and $meioVm <= $vf) {
        echo 'O número ' . $meioVm . ' <b>ESTÁ</b> entre o número INICIAL ' . $vi . ' e o número FINAL ' . $vf . '<hr>';
    } else {
        echo 'O número ' . $meioVm . ' <b>NÃO ESTÁ</b> entre o número INICIAL ' . $vi . ' e o número FINAL ' . $vf . '<hr>';
    }
}

if (isset($_POST['btn_limpar'])) {
    $vi = $vm = $meioVm = $vf = '';
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
    <form action="ex2_oplogicos.php" method="POST">
        <label>Valor INICIAL:</label>
        <input name="vi" value="<?= $vi ?>"><br><br>
        <label>Valor DO MEIO:</label>
        <input name="vm" value="<?= $vm ?>">
        <label><b>/2=</b></label>
        <input value="<?= $meioVm ?>" disabled><br><br>
        <label>Valor FINAL:</label>
        <input name="vf" value="<?= $vf ?>"><br><br>
        <button name="btn_verificar">Verificar</button>
        <button name="btn_limpar">Limpar</button>
    </form>
</body>

</html>