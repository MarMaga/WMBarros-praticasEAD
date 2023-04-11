<?php

$numero = '';

if(isset($_POST['btn_enviar'])){

    $numero = $_POST['numero'];
    
    if(trim($numero) == ''){
        echo 'Preencher o campo número';
    } else if($numero < 100){
        $diferenca = 100 - $numero;
        echo 'O número ' . $numero . ' é menor que 100 por ' . $diferenca;
    } else if($numero == 100) {
        echo 'O número ' . $numero . ' é igual a 100';
    } else {
        $diferenca = $numero - 100;
        echo 'O número ' . $numero . ' é maior que 100 por ' . $diferenca;
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
    <form action="operadores_exemplo.php" method="post">
        <label>Digite o número:</label>
        <input type="text" name="numero" value="<?= trim($numero) ?>"></input><br>
        <button name="btn_enviar">Enviar</button>
    </form>
    <hr>
</body>
</html>