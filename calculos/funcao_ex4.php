<?php

include_once '../partes/_head.php';
include_once '../funcao/funcoes.php';
include_once '../funcao/fnc2.php';

# define a variável $erro e a inicializa com 10 argumentos contendo ''
$erro = array();
for ($i = 0; $i < 10; $i++)
    $erro[] = '';

if (isset($_POST['btn_calcular'])) {

    # armazena os campos em variáveis
    $num = array();
    for ($i = 0; $i < 10; $i++) {
        $num[] = trim($_POST['n' . $i + 1]);
    }

    # validação inicial: se algum campo não foi digitado
    $campoEmBranco = false;
    for ($i = 0; $i < 10; $i++) {
        # se o campo não foi digitado
        if ($num[$i] == '') {
            # $campoEmBranco true para enviar uma mensagem abaixo
            # e conferir se o campo 10 ($num[9]) é zero para mostrar um erro
            $campoEmBranco = true;
            # define a cor de fundo do campo em branco como vermelha com letra branca
            $cores[$i] = 'bg-danger';
        } else {
            # se o campo foi digitado, a sua cor de fundo é verde com letra branca
            $cores[$i] = 'bg-success';
        }
    }

    # a princípio, pode realizar o cálculo porque os números foram digitados e são válidos
    # somente não serão validados, se algum campo não foi digitado
    $camposPreenchidos = true;
    $errodigitacao = false;

    # se há campo em branco
    if ($campoEmBranco) {
        echo 'Preencher TODOS os campos<hr>';
        # se o campo 10 é zero, dá erro de que não pode dividir por zero em vermelho e marca o campo de vermelho
        if ($num[9] == 0) {
            $erro[9] = 'Impossível dividir por zero';
            $cores[9] = 'bg-danger';
        }
        # para impedir que os campos em branco sejam validados
        $camposPreenchidos = false;
    } else {
        # segunda validação: se todos são números
        for ($i = 0; $i < 10; $i++) {
            # se, após substituir eventuais vírgulas por pontos, não é número
            if (!is_numeric(str_replace(",", ".", $num[$i]))) {
                # impede o cálculo no if debaixo
                $errodigitacao = true;
                # define a cor vermelha do campo inválido
                $cores[$i] = 'bg-danger';
                # define o erro ao lado do campo inválido
                $erro[$i] = 'Número inválido';
            } else {
                # se for número válido, o campo fica verde e não tem mensagem de erro
                $cores[$i] = 'bg-success';
                $erro[$i] = '';
            }
        }
    }

    # se todos os campos foram digitados e não houve erros de digitação (campos válidos)
    if ($camposPreenchidos && !$errodigitacao) {

        # substitui eventuais vírgulas por pontos
        for ($i = 0; $i < 10; $i++) {
            $num[$i] = str_replace(",", ".", $num[$i]);
        }

        # chama a função que pode retornar o resultado do cálculo ou 'div0' quando o campo 10 for zero
        $result = Soma9DivUlt($num);

        # substitui eventuais pontos por vírgulas para mostrar os campos com o formato correto
        for ($i = 0; $i < 10; $i++) {
            $num[$i] = str_replace(".", ",", $num[$i]);
        }

        # se o último campo for zero (div0)
        if ($result == 'div0') {
            # dá erro de que não pode dividir por zero em vermelho e marca o campo de vermelho
            $erro[9] = 'Impossível dividir por zero';
            $cores[9] = 'bg-danger';
        } else {
            # se não é div0, $result contém o resultado do cálculo que tem seus pontos
            # substituídos por vírgulas para mostrar o formato correto
            $resultado = str_replace(".", ",", $result);
        }
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
    <div class="card-body">
        <form action="funcao_ex4.php" method="post">
            <div class="col-md-12">
                <?php for ($i = 0; $i < 10; $i++) { ?>
                    <?php if ($i < 9) { ?>
                        <label>Número
                            <?= $i + 1 ?>: (+)
                        </label>
                    <?php } else { ?>
                        <label>Número
                            <?= $i + 1 ?>: (/)
                        </label>
                    <?php } ?>
                    <input name="<?= 'n' . $i + 1 ?>" value="<?= isset($num[$i]) ? $num[$i] : '' ?>"
                        class="<?= isset($cores[$i]) ? $cores[$i] : 'bg-light' ?>">
                    <?php if ($erro[$i] == '') { ?>
                        <input disabled type="text" style="border: none; background-color: white; color: red;" value=""><br>
                    <?php } else { ?>
                        <input disabled type="text" style="border: none; background-color: white; color: red;"
                            value="<?= isset($erro[$i]) ? $erro[$i] : '' ?>"><br>
                    <?php } ?>
                <?php } ?>
                <br>
                <button name="btn_calcular">Calcular</button><br><br>
                <label>Resultado:</label>
                <input value="<?= isset($resultado) ? $resultado : '' ?>" disabled class="bg-info"></input>
            </div>
        </form>
    </div>
</body>

</html>