<?php

$qtd = 10;

if(isset($_POST['btn_ver'])){

    $frutas = array();
    $mostrar = true;
    
    for($i=0; $i<$qtd; $i++) $frutas[] = $_POST['fr' . $i+1];

    for($i=0; $i<$qtd; $i++){
        if($frutas[$i] == ''){
            echo "Digite a fruta " . $i+1 . '<hr>';
            $mostrar = false;
            break;
        }
    }

    if($mostrar){
        for($i=0; $i<$qtd; $i++) echo "FRUTA GUARDADA NA POSIÇÃO $i é: $frutas[$i]<br>";
        echo '<hr>';
    } 
}

/* $fr1 = $fr2 = $fr3 = $fr4 = $fr5 = '';

if (isset($_POST['btn_ver'])) {

    $fr1 = $_POST['fr1'];
    $fr2 = $_POST['fr2'];
    $fr3 = $_POST['fr3'];
    $fr4 = $_POST['fr4'];
    $fr5 = $_POST['fr5'];

    $frutas = array();

    if ($fr1 == '') {
        echo 'Digite a primeira fruta<hr>';
    } elseif ($fr2 == '') {
        echo 'Digite a segunda fruta<hr>';
    } elseif ($fr3 == '') {
        echo 'Digite a terceira fruta<hr>';
    } elseif ($fr4 == '') {
        echo 'Digite a quarta fruta<hr>';
    } elseif ($fr5 == '') {
        echo 'Digite a quinta fruta<hr>';
    } else {
        for ($i = 0; $i < 5; $i++) $frutas[] = $_POST['fr' . $i + 1];
        for ($i = 0; $i < 5; $i++) {
            echo "FRUTA GUARDADA NA POSIÇÃO $i é: $frutas[$i]<br>";
        }
    }
} */
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
    <form action="lacoscomarray4.php" method="post">
        <?php for ($i = 0; $i < $qtd; $i++) { ?>
            <label>Fruta <?= $i+1 ?>:</label>
            <input name="<?= "fr" . $i+1 ?>" value="<?= isset($frutas) ? $frutas[$i] : '' ?>"><br><br>
        <?php } ?>

        <button name="btn_ver">Ver resultado</button>
    </form>
</body>

</html>