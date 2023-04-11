<?php

$nota1 = $nota2 = $nota3 = $nota4 = $media = '';

if (isset($_POST['btn_calcular'])) {

    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];
    $nota4 = $_POST['nota4'];

    if ($nota1 < 0 || $nota1 > 100) {
        echo 'A nota 1 deve ser um número entre 0 e 100' . '<hr>';
    } elseif ($nota2 < 0 || $nota2 > 100) {
        echo 'A nota 2 deve ser um número entre 0 e 100' . '<hr>';
    } elseif ($nota3 < 0 || $nota3 > 100) {
        echo 'A nota 3 deve ser um número entre 0 e 100' . '<hr>';
    } elseif ($nota4 < 0 || $nota4 > 100) {
        echo 'A nota 4 deve ser um número entre 0 e 100' . '<hr>';
    } else {

        $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;

        if ($media < 40) {
            echo 'REPROVADO' . '<hr>';
        } elseif ($media >= 40 && $media < 60) {
            echo 'EXAME' . '<hr>';
        } else {
            echo 'APROVADO' . '<hr>';
        }
    }
}

if (isset($_POST['btn_limpar'])) {
    $nota1 = $nota2 = $nota3 = $nota4 = $media = '';
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
    <form action="ex3_oplogicos.php" method="POST">
        <label>Nota 1:</label>
        <input name="nota1" value="<?= $nota1 ?>"><br><br>
        <label>Nota 2:</label>
        <input name="nota2" value="<?= $nota2 ?>"><br><br>
        <label>Nota 3:</label>
        <input name="nota3" value="<?= $nota3 ?>"><br><br>
        <label>Nota 4:</label>
        <input name="nota4" value="<?= $nota4 ?>"><br><br>
        <button name="btn_calcular">Calcular média -></button>
        <input value="<?= $media ?>" disabled size=1.5>
        <button name="btn_limpar">Limpar</button>
    </form>
</body>

</html>