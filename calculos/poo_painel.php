<?php

require_once '../partes/_head.php';
require_once '../Class/Painel.php';

if (isset($_POST['btn_verificar'])) {

    $grupo = array();
    $objPainel = new Painel();
    $errodigitacao = false;
    $parametros = array();
    $parametros[] = '0|8';
    $parametros[] = '10|20';
    $parametros[] = '0|10';
    $parametros[] = '-20|100';
    $parametros[] = '0|260';
    $resultado = array();
    $css = array();

    for ($i = 0; $i < 5; $i++)
        $grupo[] = $_POST['grupo' . $i + 1];

    for ($i = 0; $i < 5; $i++) {
        if (!$objPainel->Validar($grupo[$i])) {
            echo '<center><br>Preencher TODOS os grupos</center><hr>';
            $errodigitacao = true;
        }
    }

    if (!$errodigitacao) {
        for ($i = 0; $i < 5; $i++) {

            $resultado[] = $objPainel->Testar($grupo[$i], $parametros[$i]);

            switch ($resultado[$i]) {
                case -1:
                    $css[$i] = 'laranja';
                    break;
                case 0:
                    $css[$i] = 'verde';
                    break;
                case 1:
                    $css[$i] = 'vermelho';
                    break;
                case 'OK':
                    $css[$i] = 'branco';
                    break;
            }
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/Painel.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card-body">
        <form action="poo_painel.php" method="post">
            <div class="col-md-12">
                <center>
                    <table>
                        <thead>
                            <tr>

                                <th>
                                    <center>Grupo A (0:8)</center>
                                </th>
                                <th>
                                    <center>Grupo B (10:20)</center>
                                </th>
                                <th>
                                    <center>Grupo C (0:10)</center>
                                </th>
                                <th>
                                    <center>Grupo D (-20:100)</center>
                                </th>
                                <th>
                                    <center>Grupo E (0:260)</center>
                                </th>
                            </tr>
                        <tbody>
                            <tr>
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <td>
                                        <input name="<?= 'grupo' . $i + 1 ?>"
                                            value="<?= isset($grupo[$i]) ? $grupo[$i] : '' ?>"
                                            class="<?= isset($css[$i]) ? $css[$i] : 'branco' ?>">
                                    </td>
                                <?php } ?>
                            </tr>
                        </tbody>
                        </thead>
                    </table>
                    <br>
                    <button name="btn_verificar" class="btn btn-primary">Verificar</button>
                </center>
            </div>
        </form>
    </div>
</body>

</html>