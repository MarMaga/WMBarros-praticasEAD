<?php

if(isset($_POST['btn_enviar'])){

    $cidade = $_POST['cidade'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];

    echo $cidade . ', ' . $dia . ' de ' . $mes . ' de ' . $ano . '<hr>';

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
    <form action="ex4_formulario.php" method="post">
        <label>Cidade:</label><br>
        <input name="cidade" placeholder="Digite a cidade"><br>
        <label>Dia:</label><br>
        <input name="dia" placeholder="Digite o dia"><br>
        <label>Mês:</label><br>
        <input name="mes" placeholder="Digite o mês"><br>
        <label>Ano:</label><br>
        <input name="ano" placeholder="Digite o ano"><br>
        <label>Hora:</label><br>
        <input name="hora" placeholder="Digite a hora"><br>
        <hr>
        <button name="btn_enviar"> Enviar </button>
    </form>
</body>
</html>