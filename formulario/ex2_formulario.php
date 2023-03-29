<?php

if (isset($_POST['btn_enviar'])) {

    $nome = $_POST['nome'];
    $site = $_POST['site'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $descricao = $_POST['descricao'];

    echo 'Nome da empresa: ' . $nome . '<br>' .
        'Site: ' . $site . '<br>' .
        'Facebook: ' . $facebook . '<br>' .
        'Instagram: ' . $instagram . '<br>' .
        'Descrição: ' . $descricao . '<hr>';
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
    <form action="ex2_formulario.php" method="post">
        <label>Nome da empresa:</label><br>
        <input name="nome" placeholder="Digite o nome da empresa"><br>
        <label>Site:</label><br>
        <input name="site" placeholder="Digite o site da empresa"><br>
        <label>Facebook:</label><br>
        <input name="facebook" placeholder="Digite o Facebook da empresa"><br>
        <label>Instagram:</label><br>
        <input name="instagram" placeholder="Digite o Instagram da empresa"><br>
        <label>Descrição:</label><br>
        <input name="descricao" placeholder="Digite a descrição da empresa"><br>
        <hr>
        <button name="btn_enviar"> Enviar </button>
    </form>
</body>

</html>