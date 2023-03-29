<?php

if (isset($_POST['btn_enviar'])) {

    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $editora = $_POST['editora'];
    $qt_pag = $_POST['qt_pag'];
    $autores = $_POST['autores'];
    $valor = $_POST['valor'];
    $resumo = $_POST['resumo'];

    echo 'Nome do livro: <b>' . $nome . '</b> Ano: <b>' . $ano . '</b><br>' .
        'Editora: <b>' . $editora . '</b> Qtd de páginas: ' . $qt_pag . '</b><br>' .
        'Autores: <b>' . $autores . '</b><br>' .
        'Valor: <b>' . $valor . '</b><br>' .
        'Resumo: <b>' . $resumo . '</b><hr>';
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
    <form action="ex3_formulario.php" method="post">
        <label>Nome do livro:</label><br>
        <input name="nome" placeholder="Digite o nome do livro"><br>
        <label>Ano:</label><br>
        <input name="ano" placeholder="Digite o ano do livro"><br>
        <label>Editora:</label><br>
        <input name="editora" placeholder="Digite a editora do livro"><br>
        <label>Quantidade de páginas:</label><br>
        <input name="qt_pag" placeholder="Digite as quantidade de páginas do livro"><br>
        <label>Autores:</label><br>
        <input name="autores" placeholder="Digite os autores do livro"><br>
        <label>Valor:</label><br>
        <input name="valor" placeholder="Digite o valor do livro"><br>
        <label>Resumo:</label><br>
        <input name="resumo" placeholder="Digite o resumo do livro"><br>
        <hr>
        <button name="btn_enviar"> Enviar </button>
    </form>
</body>

</html>