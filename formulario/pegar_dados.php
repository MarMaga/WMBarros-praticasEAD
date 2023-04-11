<?php

$nome = '';
$sobrenome = '';

if (isset($_POST['btn_mostrar'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];

    if(trim($nome) == ''){
        echo 'Preencher o campo NOME<hr>';
    }
    elseif(trim($sobrenome) == ''){
        echo 'Preencher o campo SOBRENOME<hr>';
    }
    else{
        header("location: mostrar_dados.php?nome=$nome&sobrenome=$sobrenome");
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
    <form action="pegar_dados.php" method="POST">
        <label>Nome:</label>
        <input name="nome" value="<?= $nome ?>"><br><br>
        <label>Sobrenome:</label>
        <input name="sobrenome" value="<?= $sobrenome ?>"><br><br>
        <button name="btn_mostrar">Mostrar</button>
    </form>
</body>

</html>