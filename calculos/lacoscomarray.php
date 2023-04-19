<?php

$qtd = '';
$valorinicial = '';

if(isset($_POST['btn_ver'])){

    $qtd = $_POST['qtd'];
    $valorinicial = $_POST['valorinicial'];
    $valor = $valorinicial;

    $numero = array();
    
    for($i=0; $i < $qtd; $i++){
        $numero[] = $valor;
        $valor++;
    }

    echo 'Lista de números<br><br>';

    for($i=0; $i < count($numero); $i++){
        echo "Número: $numero[$i]<br>";
    }

    echo '<br>Total de números: ' . count($numero) . '<hr>';
}

?>

<html>
    <body>
        <form method="POST" action="lacoscomarray.php">
            <label>Quantidade de repetições:</label><br><br>
            <input name="qtd" value="<?= $qtd ?>"><br><br>
            <label>Valor inicial:</label><br><br>
            <input name="valorinicial" value="<?= $valorinicial ?>"><br><br>
            <button name="btn_ver">Ver repetições</button>
        </form>
    </body>
</html>