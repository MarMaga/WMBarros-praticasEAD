<?php

$nome = '';
$peso = '';
$altura = '';

if (isset($_POST['btn_calcular'])) {

    $nome = $_POST['nome'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    if ($nome == '') {
        echo 'Digite o nome.<hr>';
    } elseif ($peso == '') {
        echo 'Digite o peso.<hr>';
    } elseif ($peso <= 0) {
        echo 'O peso deve ser maior que zero.<hr>';
        $peso = '';
    } elseif ($altura == '') {
        echo 'Digite a altura.<hr>';
    } elseif ($altura <= 0) {
        echo 'A altura deve ser maior que zero.<hr>';
        $altura = '';
    } else {

        if (str_contains($altura, ",")) {
            $altura = str_replace(",", ".", $altura);
        }

        if (strlen($altura) == 3 && !str_contains($altura, ",")) {
            $altura = substr($altura, 0, 1) . '.' . substr($altura, 1, strlen($altura));
        }

        header("location: ex1_mostrardadosimc.php?nome=$nome&peso=$peso&altura=$altura");
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
    <form action="ex1_pegardadosimc.php" method="post">
        <label>Seu nome:</label>
        <input name="nome" value="<?= $nome ?>"><br><br>
        <label>Seu peso:</label>
        <input name="peso" value="<?= $peso ?>"><br><br>
        <label>Sua altura:</label>
        <input name="altura" value="<?= $altura ?>"><br><br>
        <button name="btn_calcular">Calcular</button>
    </form>
</body>

</html>