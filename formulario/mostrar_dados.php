<?php

if (
    !isset($_GET['nome']) ||
    $_GET['nome'] == '' ||
    !isset($_GET['sobrenome']) ||
    $_GET['sobrenome'] == ''
) {
    header('location: pegar_dados.php');
    exit;
}

$nome = $_GET['nome'];
$sobrenome = $_GET['sobrenome'];

$nomecompleto = "$nome $sobrenome";

?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <label>Nome completo: <?= $nomecompleto ?></label>
</body>

</html>