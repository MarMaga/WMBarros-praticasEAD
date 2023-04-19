<?php

if(
    !isset($_GET['nome']) ||
    $_GET['nome'] == '' ||
    !isset($_GET['vlrinvest']) ||
    $_GET['vlrinvest'] == '' ||
    !isset($_GET['siglainvest']) ||
    $_GET['siglainvest'] == '' ||
    !isset($_GET['siglabanco']) ||
    $_GET['siglabanco'] == ''){
        header('location: ex2_pegarinvestimento.php');
        exit;
    }

$nome = $_GET['nome'];
$vlrinvest = $_GET['vlrinvest'];
$siglainvest = $_GET['siglainvest'];
$siglabanco = $_GET['siglabanco'];

if($siglainvest == 'G'){
    $percentGP = 0.03;
}else{
    $percentGP = -0.05;
}

if($siglabanco == 'SA'){
    $nomebanco = 'SANTANDER';
}elseif($siglabanco == 'IT'){
    $nomebanco = 'ITAÚ';
}else{
    $nomebanco = 'SICREDI';
}

$vlrinvest = floatval($vlrinvest);
$ganho = $vlrinvest + ($vlrinvest * $percentGP);

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
    <label><?=$nome?>,</label>
    <label>seu valor de investimento foi de R$ <?= number_format($vlrinvest,2,",",".") ?>,</label>
    <label>a sigla de sua simulação escolhida foi <?= $siglainvest ?>.</label>
    <label>O banco escolhido foi <?= $nomebanco ?> e</label>
    <?php
        if($siglainvest == 'G'){
    ?>
            <label>o resultado é de R$ <?= number_format($ganho,2,",",".") ?>, ou seja, um "Ganho de 3%".</label>
     <?php   }else{
    ?>
            <label>o resultado é de R$ <?= number_format($ganho,2,",",".") ?>, ou seja, uma "Perda de 5%".</label>
    <?php    } ?>
</body>
</html>