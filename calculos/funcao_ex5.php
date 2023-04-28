<?php

include_once '../partes/_head.php';
include_once '../funcao/funcoes.php';
include_once '../funcao/fnc2.php';

if (isset($_POST['btn_calcular'])) {

    # armazena os campos em variáveis
    $salario = trim($_POST['salario']);
    $porcentagem = trim($_POST['porcentagem']);

    $salario = str_replace(",", ".", $salario);
    $porcentagem = str_replace(",", ".", $porcentagem);

    $errodigitacao = false;

    $salario = AjustaCasasDecimais($salario, 2);
    $valorAumentado = EncontraValorAumentado($salario, $porcentagem);
    if ($valorAumentado == 0) {
        echo 'Preencher todos os campos da função<hr>';
        $errodigitacao = true;
    } else {
        # se retornar -1, há algum número inválido
        # valida a digitação dos campos
        if ($salario < 0 || !is_numeric($salario)) {
            $errodigitacao = true;
            $erroSalario = 'Número inválido';
            $corSalario = 'bg-danger';
        } else {
            $erroSalario = '';
            $corSalario = 'bg-success';
        }

        $porcentagem = AjustaCasasDecimais($porcentagem, 2);
        if ($porcentagem < 0 || !is_numeric($porcentagem)) {
            $errodigitacao = true;
            $erroPorcentagem = 'Número inválido';
            $corPorcentagem = 'bg-danger';
        } else {
            $erroPorcentagem = '';
            $corPorcentagem = 'bg-success';
        }
    }

    if (!$errodigitacao && $valorAumentado != -1){

        $valorNovoSalario = number_format(CalculaNovoSalario($salario, $valorAumentado),2,",",".");

        $salario = number_format(floatval($salario), 2, ",", ".");
        $porcentagem = number_format(floatval($porcentagem), 2, ",", ".");
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
    <div class="card-body">
        <form action="funcao_ex5.php" method="post">
            <div class="col-md-12">
                <label>Salário (R$):</label>
                <input name="salario" value="<?= isset($salario) ? $salario : '' ?>"
                    class="<?= isset($corSalario) ? $corSalario : 'bg-light' ?>">
                <input disabled style="border: none; color: red; background-color: white;"
                    value="<?= isset($erroSalario) ? $erroSalario : '' ?>"><br><br>
                <label>Aumento (%):</label>
                <input name=" porcentagem" value="<?= isset($porcentagem) ? $porcentagem : '' ?>"
                    class="<?= isset($corPorcentagem) ? $corPorcentagem : 'bg-light' ?>">
                <input disabled style="border: none; color: red; background-color: white;"
                    value="<?= isset($erroPorcentagem) ? $erroPorcentagem : '' ?>"><br><br>
                <button name="btn_calcular" class="btn btn-primary">Calcular</button><br><br>
                <label>Novo Salário:</label>
                <input value="<?= isset($valorNovoSalario) ? $valorNovoSalario : '' ?>" disabled class="bg-info"></input>
            </div>
        </form>
    </div>
</body>

</html>