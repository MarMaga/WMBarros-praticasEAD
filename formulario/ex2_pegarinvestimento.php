<?php

$nome = '';
$vlrinvest = '';
$siglainvest = '';
$siglabanco = '';

if (isset($_POST['btn_resultado'])) {

    $nome = trim($_POST['nome']);
    $vlrinvest = $_POST['vlrinvest'];
    $siglainvest = strtoupper($_POST['siglainvest']);
    $siglabanco = strtoupper($_POST['siglabanco']);
    
    if ($nome == '') {
        echo 'Digite o nome<hr>';
    } elseif (!is_numeric(str_replace(".","",str_replace(",","",$vlrinvest)))) {
        echo 'Digite o valor do investimento corretamente<hr>';
    } elseif ($vlrinvest == '' || $vlrinvest <= 0) {
        echo 'O valor do investimento deve ser positivo<hr>';
    } elseif ($siglainvest == '') {
        echo 'Digite a sigla do investimento<hr>';
    } elseif ($siglainvest != 'G' && $siglainvest != 'P') {
        echo 'Sigla do investimento inválida<hr>';
    } elseif ($siglabanco == '') {
        echo 'Digite a sigla do banco<hr>';
    } elseif ($siglabanco != 'SA' && $siglabanco != 'IT' && $siglabanco != 'SI') {
        echo 'Sigla do banco inválida<hr>';
    } else {
        if (str_contains($vlrinvest, ",")) {
            $vlrinvest = str_replace(",", ".", $vlrinvest);
        }

        switch ($siglabanco) {
            case 'SA':
                $nomebanco = 'SANTANDER';
                break;
            case 'IT':
                $nomebanco = 'ITAÚ';
                break;
            case 'SI':
                $nomebanco = 'SICREDI';
                break;
        }
        header("location: ex2_mostrarinvestimento.php?nome=$nome&vlrinvest=$vlrinvest&siglainvest=$siglainvest&nomebanco=$nomebanco");
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
    <form action="ex2_pegarinvestimento.php" method="POST">
        <label>Nome:</label>
        <input name="nome" value="<?= $nome ?>"><br><br>
        <label>Valor do investimento:</label>
        <input name="vlrinvest" value="<?= $vlrinvest ?>"><br><br>
        <br>
        <label><b>ESCOLHA DO INVESTIMENTO</b></label><br>
        <label>- Ganho de 3% - SIGLA "G"</label><br>
        <label>- Perda de 5% - SIGLA "P"</label><br><br>
        <label>Digite a sigla:</label>
        <input name="siglainvest" value="<?= $siglainvest ?>">
        <br><br>
        <label><b>ESCOLHA O BANCO</b></label><br>
        <label>- SANTANDER - SIGLA "SA"</label><br>
        <label>- ITAÚ - SIGLA "IT"</label><br>
        <label>- SICREDI - SIGLA "SI"</label><br><br>
        <label>Digite a sigla:</label>
        <input name="siglabanco" value="<?= $siglabanco ?>"><br><br>
        <button name="btn_resultado">Ver resultado</button>
    </form>
</body>

</html>