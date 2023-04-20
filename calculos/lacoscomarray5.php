<?php

if(isset($_POST['btn_calcular'])){
    $tabuada = $_POST['tabuada'];
    $numlimite = $_POST['numlimite'];

    if($tabuada == '' || $tabuada <= 0){
        echo 'Digite um número positivo<hr>';
    }elseif($numlimite == '' || $numlimite <= 0){
        echo 'Digite um limite positivo<hr>';
    }else{
        echo "TABUADA: $tabuada <br>";
        echo "CALCULAR ATÉ: $numlimite <br><br>";

        for($i=0; $i<$numlimite; $i++) echo $tabuada . ' x ' . $i+1 . ' = ' . $tabuada * ($i+1) . '<br>';
        
        echo '<hr>';
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
    <form action="lacoscomarray5.php" method="post">
        <label>Tabuada:</label>
        <input name="tabuada" value="<?= isset($tabuada) ? $tabuada : '' ?>"><br><br>
        <label>Calcular até:</label>
        <input name="numlimite" value="<?= isset($numlimite) ? $numlimite : '' ?>"><br><br>
        <button name="btn_calcular">Calcular</button>
    </form>
</body>
</html>