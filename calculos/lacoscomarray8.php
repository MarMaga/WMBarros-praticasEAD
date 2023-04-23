<?php

if (isset($_POST['btn_armazenar'])) {

    $pesq1 = $_POST['pesq1'];
    $pesq2 = $_POST['pesq2'];

    # armazena os campos do form nas variáveis
    $numeros = array();
    for ($i = 0; $i < 5; $i++) $numeros[] = $_POST['num' . $i + 1];

    # valida a digitação dos campos
    $errodigitacao = False;
    for ($i = 0; $i < 5; $i++) {
        if ($numeros[$i] == '' || $numeros[$i] == 0) {
            echo 'Digite um número diferente de zero em Número ' . $i + 1 . '<hr>';
            $errodigitacao = True;
            break;
        }
    }

    if ($pesq1 == $pesq2 && $pesq1 != '') {
        echo 'O número inicial da pesquisa não pode ser igual ao número final<hr>';
        $errodigitacao = True;
    }

    if (!$errodigitacao) {

        $numQuad = array();

        # armazena o quadrado dos números digitados em $numQuad
        for ($i = 0; $i < 5; $i++) $numQuad[$i] = $numeros[$i] * $numeros[$i];

        # se $pesq1 > $pesq2, inverte-os
        if ($pesq1 > $pesq2) {
            $temp = $pesq1;
            $pesq1 = $pesq2;
            $pesq2 = $temp;
        }

        # pesquisa os números digitados em $numQuad e exibe os encontrados
        $numEncontrado = False;
        for ($i = 0; $i < 5; $i++) {
            if ($numQuad[$i] >= $pesq1 && $numQuad[$i] <= $pesq2) {
                echo 'Número ' . $i+1 . ": <b>$numQuad[$i]</b> que está na posição $i<br>";
                $numEncontrado = True;
            }
        }
        if (!$numEncontrado) echo "Nenhum número encontrado entre $pesq1 e $pesq2";
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
    <form action="lacoscomarray8.php" method="post">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <label>Número <?= $i + 1 ?>:</label>
            <input name="<?= 'num' . $i + 1 ?>" value="<?= isset($numeros[$i]) ? $numeros[$i] : '' ?>"><br><br>
        <?php } ?>
        <label>Pesquisar entre:</label>
        <input name="pesq1" value="<?= isset($pesq1) ? $pesq1 : '' ?>">
        <label>e:</label>
        <input name="pesq2" value="<?= isset($pesq2) ? $pesq2 : '' ?>"><br><br>
        <button name="btn_armazenar">Armazenar</button>
    </form>
</body>

</html>