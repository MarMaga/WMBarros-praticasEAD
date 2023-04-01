<?php

$n1 = '';
$n2 = '';
$n3 = '';

if(isset($_POST['btn_enviar'])){
    
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];

    if(($n2 > $n1) && ($n2 < $n3)){
        echo 'O número ' . $n2 . ' está entre ' . $n1 . ' e ' . $n3;
    } else {
        echo 'O número ' . $n2 . ' não está entre ' . $n1 . ' e ' . $n3;
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
    <form action="operadores_intervalo.php" method="post">
        <label>Número 1:</label>
        <input name="n1" value="<?= $n1 ?>"></input><br>
        <label>Número 2:</label>
        <input name="n2" value="<?= $n2 ?>"></input><br>
        <label>Número 3:</label>
        <input name="n3" value="<?= $n3 ?>"></input><br>
        <button name="btn_enviar">Enviar</button>
    </form>
</body>
</html>