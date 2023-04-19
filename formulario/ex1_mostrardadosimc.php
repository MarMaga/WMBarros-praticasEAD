<?php

if (isset($_POST['btn_voltar'])){
    header('location: ex1_pegardadosimc.php');
    exit;
}

if (
    !isset($_GET['nome']) ||
    $_GET['nome'] == '' ||
    $_GET['peso'] == '' ||
    $_GET['altura'] == ''
) {
    header("location: ex1_pegardadosimc.php");
    exit;
}

$nome = $_GET['nome'];
$peso = $_GET['peso'];
$altura = $_GET['altura'];

$imc = $peso / ($altura * $altura);

if($imc >= 0 && $imc < 21){
    $classif = 'MAGRO';
}elseif($imc >= 21 && $imc < 26){
    $classif = 'PESO IDEAL';
}elseif($imc >= 26 && $imc < 31){
    $classif = 'OBESO';
}elseif($imc >= 31){
    $classif = 'MUITO OBESO';
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
    <form action="ex1_mostrardadosimc.php" method="POST">
        <label>Nome: <?= $nome ?></label><br><br>
        <label>IMC: <?= $imc ?></label><br><br>
        <label>Classificação do IMC: <b><?= $classif ?></b></label>
        <hr>
        <button name="btn_voltar">Voltar</button>
    </form>
</body>

</html>