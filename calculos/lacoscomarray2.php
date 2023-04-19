<?php

$nome = '';
$idade = '';
$qtd = '';

if(isset($_POST['btn_ver'])){

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $qtd = $_POST['qtd'];

    if($nome == ''){
        echo 'Digite o nome<hr>';
    } elseif($idade == '' || $idade < 0){
        echo 'Digite uma idade válida<hr>';
    } else {
        for($i=0; $i<$qtd; $i++){
            echo "MEU NOME É $nome, TENHO $idade ANOS DE IDADE<br>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=<">
    <title>Document</title>
</head>
<body>
    <form action="lacoscomarray2.php" method="post">
        <label>Nome:</label>
        <input name="nome" value="<?= $nome ?>"><br><br>
        <label>Idade:</label>
        <input name="idade" value="<?= $idade ?>"><br><br>
        <label>Quantidade de repetições:</label>
        <input name="qtd" value="<?= $qtd ?>"><br><br>
        <button name="btn_ver">Ver resultado</button>
    </form>
</body>
</html>