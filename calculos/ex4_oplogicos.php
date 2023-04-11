<?php

$salario = '';
$aumento = '';
$novosalario = '';

if (isset($_POST['btn_calcular'])) {

    $salario = $_POST['salario'];
    $aumento = $_POST['aumento'];

    $tamSalario = strlen($salario);
    $tamAumento = strlen($aumento);

    if ($tamSalario == 0 || $salario == 0 || $salario < 0) {
        echo 'Digite um valor positivo para o salário<hr>';
    } elseif ($tamAumento == 0 || $aumento == 0 || $aumento < 0) {
        echo 'Digite uma porcentagem maior que zero<hr>';
    } else {

        $novosalario = $salario + ($salario * $aumento) / 100;
        $diferenca = $novosalario - $salario;
        
        if ($diferenca <= 100) {
            echo 'Aumento Nível 1<hr>';
        } elseif ($diferenca <= 200) {
            echo 'Aumento Nível 2<hr>';
        } elseif ($diferenca <= 300) {
            echo 'Aumento Nível 3<hr>';
        } elseif ($diferenca <= 400) {
            echo 'Aumento Nível 4<hr>';
        } else {
            echo 'Aumento Nível 5<hr>';
        }
    }
}
if(isset($_POST['btn_limpar'])){
    $salario = $aumento = $novosalario = '';
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
    <form action="ex4_oplogicos.php" method="POST">
        <label>Salário:</label>
        <input name="salario" value="<?= $salario ?>"><br><br>
        <label>Aumento (%):</label>
        <input name="aumento" value="<?= $aumento ?>"><br><br>
        <button name="btn_calcular">Calcular -></button>
        <input value="<?= $novosalario ?>" disabled size=4>
        <button name="btn_limpar">Limpar</button>
    </form>
</body>

</html>