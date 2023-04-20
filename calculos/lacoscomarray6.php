<?php

$quant = 7;

if(isset($_POST['btn_limpar'])){
    unset($numeros);
    
    /*for($i=0; $i < $quant; $i++){
        $numeros[$i] = '';
    }*/
}

if (isset($_POST['btn_pesquisar'])) {

    $numeros = array();

    for ($i = 0; $i < $quant; $i++) $numeros[] = $_POST['num' . $i + 1];

    $numpesq = $_POST['numpesq'];

    $errodigitacao = False;

    for ($i = 0; $i < $quant; $i++) {
        if ($numeros[$i] == '') {
            echo 'Digite o número ' . $i + 1 . '<hr>';
            $errodigitacao = True;
            break;
        }
    }

    if (!$errodigitacao) {

        $posicao = '';

        for ($i = 0; $i < $quant; $i++) {
            if ($numpesq == $numeros[$i]) $posicao = $i;
        }

        if ($posicao == '') {
            echo "Número $numpesq não encontrado<hr>";
        } else {
            echo "Número $numpesq encontrado na posição $posicao<hr>";
        }
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
    <form action="lacoscomarray6.php" method="post">
        <?php for ($i = 0; $i < 7; $i++) { ?>
            <label>Número <?= $i + 1 ?>:</label>
            <input name="<?= 'num' . $i + 1 ?>" value="<?= isset($numeros) ? $numeros[$i] : '' ?>"><br><br>
        <?php } ?>

        <label>Número a pesquisar:</label>
        <input name="numpesq" value="<?= isset($numpesq) ? $numpesq : '' ?>"><br><br>
        <button name="btn_pesquisar">Pesquisar</button>
        <button name="btn_limpar">Limpar</button>
    </form>
</body>

</html>