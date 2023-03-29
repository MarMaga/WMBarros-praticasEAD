<?php

$s1 = ''; $s2 = ''; $somado = '';
$m1 = ''; $m2 = ''; $multiplicado = '';
$d1 = ''; $d2 = ''; $dividido = '';
$sub1 = ''; $sub2 = ''; $subtraido = '';


if (isset($_POST['btn_somar'])) {
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $somado = $s1 + $s2;
}

if(isset($_POST['btn_multiplicar'])){
    $m1 = $_POST['m1'];
    $m2 = $_POST['m2'];
    $multiplicado = $m1 * $m2;
}

if(isset($_POST['btn_dividir'])){
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    if($d2 == 0){
        echo 'Não pode multiplicar por zero';
    }
    else{
        $dividido = $d1 / $d2;
    }    
}

if(isset($_POST['btn_subtrair'])){
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $subtraido = $sub1 - $sub2;
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
    <form action="calculadora.php" method="post">
        <h1>SOMAR</h1>
        <label>Numero 1:</label>
        <input name="s1" value="<?= $s1 ?>">
        <label>Numero 2:</label>
        <input name="s2" value="<?= $s2 ?>">
        <button name="btn_somar">Somar</button>
        <label>Soma:</label>
        <input value="<?= $somado ?>" disabled>
    </form>
    <hr>
    <form action="calculadora.php" method="post">
        <h1>MULTIPLICAR</h1>
        <label>Numero 1:</label>
        <input name="m1" value="<?= $m1 ?>">
        <label>Numero 1:</label>
        <input name="m2" value="<?= $m2 ?>">
        <button name="btn_multiplicar">Multiplicar</button>
        <input value="<?= $multiplicado ?>" disabled>
    </form>
    <hr>
    <form action="calculadora.php" method="post">
        <h1>DIVIDIR</h1>
        <label>Numero 1:</label>
        <input name="d1" value="<?= $d1 ?>">
        <label>Numero 2:</label>
        <input name="d2" value="<?= $d2 ?>">
        <button name="btn_dividir">Dividir</button>
        <input value="<?= $dividido ?>" disabled>
    </form>
    <hr>
    <form action="calculadora.php" method="post">
        <h1>SUBTRAIR</h1>
        <label>Numero 1:</label>
        <input name="sub1" value="<?= $sub1 ?>">
        <label>Numero 2:</label>
        <input name="sub2" value="<?= $sub2 ?>">
        <button name="btn_subtrair">Subtrair</button>
        <input value="<?= $subtraido ?>" disabled>
    </form>
</body>

</html>