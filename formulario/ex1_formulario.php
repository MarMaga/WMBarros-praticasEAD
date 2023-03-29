<?php

if (isset($_POST['btn_enviar'])) {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $ingredientes = $_POST['ingredientes'];

    echo 'Nome do prato: ' . $nome . '<br>' .
        'Descrição: ' . $descricao . '<br>' .
        'Preço: ' . $preco . '<br>' .
        'Ingredientes: ' . $ingredientes . '<hr>';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa HTML</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <form action="ex1_formulario.php" method="post">
        <label>Nome do prato</label><br>
        <input name="nome" placeholder="Digite o nome do prato"><br>
        <label>Descrição</label><br>
        <input name="descricao" placeholder="Digite a descrição do prato"><br>
        <label>Preço</label><br>
        <input name="preco" placeholder="Digite o preço do prato"><br>
        <label>Ingredientes</label><br>
        <input name="ingredientes" placeholder="Digite os ingredientes do prato"><br>
        <hr>
        <button name="btn_enviar"> Enviar </button>
    </form>
</body>

</html>