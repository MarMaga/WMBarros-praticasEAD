<?php

include_once '../funcao/funcoes.php';
include_once '../funcao/fnc2.php';

if (isset($_POST['btn_enviar'])) {

    $Nome = $_POST['nome'];
    $Descricao = $_POST['descricao'];
    $Senha1 = $_POST['senha1'];
    $Senha2 = $_POST['senha2'];

    $NomeInvalido = false;
    $DescInvalida = false;
    $Sen1Invalida = false;
    $Sen2Invalida = false;

    # valida a digitação dos campos
    $errodigitacao = False;
    if (!ValidaTamanhoCampo($Nome, 3)) {
        echo 'Nome deve conter no mínimo 3 caracteres<br>';
        $errodigitacao = True;
        $NomeInvalido = true;
    }
    if (!ValidaTamanhoCampo($Descricao, 50)) {
        echo 'Descrição deve conter no mínimo 50 caracteres<br>';
        $errodigitacao = True;
        $DescInvalida = true;
    }
    if (!ValidaTamanhoCampo($Senha1, 6)) {
        echo 'Senha deve conter no mínimo 6 caracteres<br>';
        $errodigitacao = True;
        $Sen1Invalida = true;
    } elseif (!ValidaCamposIguais($Senha1, 6, $Senha2)) {
        echo 'As senhas não são iguais<br>';
        $errodigitacao = True;
        $Sen2Invalida = true;
    }

    if (empty($Senha1) && empty($Senha2))
        unset($Sen2Invalida);

    if (!$errodigitacao)
        echo "CAMPOS VALIDADOS COM SUCESSO";
    echo '<hr>';
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
    <form action="ex2_funcao.php" method="post">
        <label>Nome:</label>
        <?php if (!isset($NomeInvalido)) { ?>
            <input name="nome" value="<?= isset($Nome) ? $Nome : '' ?>"><br><br>
        <?php } elseif (!$NomeInvalido) { ?>
            <input name="nome" value="<?= isset($Nome) ? $Nome : '' ?>"
                style="color: white; background-color: green;"><br><br>
        <?php } else { ?>
            <input name="nome" value="<?= isset($Nome) ? $Nome : '' ?>" style="color:white; background-color:red;"><br><br>
        <?php } ?>

        <label>Descrição:</label>
        <?php if (!isset($DescInvalida)) { ?>
            <input name="descricao" value="<?= isset($Descricao) ? $Descricao : '' ?>"><br><br>
        <?php } elseif (!$DescInvalida) { ?>
            <input name="descricao" value="<?= isset($Descricao) ? $Descricao : '' ?>"
                style="color: white; background-color: green;"><br><br>
        <?php } else { ?>
            <input name="descricao" value="<?= isset($Descricao) ? $Descricao : '' ?>"
                style="color:white; background-color:red;"><br><br>
        <?php } ?>

        <label>Senha:</label>
        <?php if (!isset($Sen1Invalida)) { ?>
            <input name="senha1" type="password" value="<?= isset($Senha1) ? $Senha1 : '' ?>"><br><br>
        <?php } elseif (!$Sen1Invalida) { ?>
            <input name="senha1" type="password" value="<?= isset($Senha1) ? $Senha1 : '' ?>"
                style="color: white; background-color: green;"><br><br>
        <?php } else { ?>
            <input name="senha1" type="password" value="<?= isset($Senha1) ? $Senha1 : '' ?>"
                style="color:white; background-color:red;"><br><br>
        <?php } ?>

        <label>Repetir Senha:</label>
        <?php if (!isset($Sen2Invalida)) { ?>
            <input name="senha2" type="password" value="<?= isset($Senha2) ? $Senha2 : '' ?>"
                style="color: black; background-color: white;"><br><br>
        <?php } elseif (!$Sen2Invalida) { ?>
            <input name="senha2" type="password" value="<?= isset($Senha2) ? $Senha2 : '' ?>"
                style="color: white; background-color: green;"><br><br>
        <?php } else { ?>
            <input name="senha2" type="password" value="<?= isset($Senha2) ? $Senha2 : '' ?>"
                style="color: white; background-color: red;"><br><br>
        <?php } ?>

        <button name="btn_enviar">Enviar</button>
    </form>
</body>

</html>