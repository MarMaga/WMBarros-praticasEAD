<?php

include_once '../funcao/funcoes.php';
include_once '../funcao/fnc2.php';

if (isset($_POST['btn_enviar'])) {

    $Nome = $_POST['nome'];
    $Descricao = $_POST['descricao'];
    $Senha1 = $_POST['senha1'];
    $Senha2 = $_POST['senha2'];

    # valida a digitação dos campos
    $errodigitacao = False;
    if (!ValidaTamanhoCampo($Nome,3)){
        echo 'Nome deve conter no mínimo 3 caracteres<br>';
        $errodigitacao = True;
    }
    if (!ValidaTamanhoCampo($Descricao,50)){
        echo 'Descrição deve conter no mínimo 50 caracteres<br>';
        $errodigitacao = True;
    }
    if (!ValidaTamanhoCampo($Senha1,6)){
        echo 'Senha deve conter no mínimo 6 caracteres<br>';
        $errodigitacao = True;
    }elseif (!ValidaCamposIguais($Senha1,6,$Senha2)){
        echo 'As senhas não são iguais<br>';
        $errodigitacao = True;
    }

    if (!$errodigitacao) echo "CAMPOS VALIDADOS COM SUCESSO";
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
        <input name="nome" value="<?= isset($Nome) ? $Nome : '' ?>"><br><br>
        <label>Descrição:</label>
        <input name="descricao" value="<?= isset($Descricao) ? $Descricao : '' ?>"><br><br>
        <label>Senha:</label>
        <input name="senha1" type="password" value="<?= isset($Senha1) ? $Senha1 : '' ?>"><br><br>
        <label>Repetir Senha:</label>
        <input name="senha2" type="password" value="<?= isset($Senha2) ? $Senha2 : '' ?>"><br><br>
        <button name="btn_enviar">Enviar</button>
    </form>
</body>

</html>