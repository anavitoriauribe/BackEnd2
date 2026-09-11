<?php
declare(strict_types=1);

// Função para calcular a fórmula do IMC
function calcularIMC(float $peso, float $altura): float {
    return $peso / ($altura * $altura);
}

// Função para classificar o resultado conforme a tabela da OMS
function classificarIMC(float $imc): string {
    if ($imc < 18.5) return "Abaixo do peso";
    if ($imc < 25.0) return "Peso normal";
    if ($imc < 30.0) return "Sobrepeso";
    return "Obesidade";
}

$erro = [];
$resultado = null;
$classeCor = "";

// Leitura inicial das entradas do formulário via $_POST
$nome = trim((string)($_POST['nome'] ?? ''));
$pesoTexto = trim((string)($_POST['peso'] ?? ''));
$alturaTexto = trim((string)($_POST['altura'] ?? ''));

// Executa validações apenas quando a requisição for enviada via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($nome === '') {
        $erro['nome'] = "Informe seu nome.";
    }

    $peso = filter_var($pesoTexto, FILTER_VALIDATE_FLOAT);
    if ($peso === false || $peso < 20 || $peso > 300) {
        $erro['peso'] = "Informe um peso válido entre 20kg e 300kg.";
    }

    $altura = filter_var($alturaTexto, FILTER_VALIDATE_FLOAT);
    if ($altura === false || $altura < 0.5 || $altura > 2.5) {
        $erro['altura'] = "Informe uma altura válida entre 0.5m e 2.5m.";
    }

    // Processa o cálculo caso não existam erros
    if (empty($erro)) {
        $valorIMC = calcularIMC((float)$peso, (float)$altura);
        $classificacao = classificarIMC($valorIMC);

        // Define a classe CSS baseada na faixa de resultado
        if ($classificacao === "Peso normal") $classeCor = "green";
        elseif ($classificacao === "Sobrepeso") $classeCor = "orange";
        else $classeCor = "red";

        $resultado = [
            'imc' => number_format($valorIMC, 2, ',', '.'),
            'classificacao' => $classificacao
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ex 02 - Calculadora IMC</title>
    <link rel="icon" type="image/png" href="favicon.ico">
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f8; padding: 20px; }
        main { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        h1 { color: #a02581; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background: #a02581; color: white; border: none; padding: 10px 15px; margin-top: 15px; border-radius: 4px; cursor: pointer; }
        .erro { color: #b00020; font-size: 0.85em; }
        .green { color: green; font-weight: bold; }
        .orange { color: orange; font-weight: bold; }
        .red { color: red; font-weight: bold; }
        .voltar { display: inline-block; margin-bottom: 15px; color: #a02581; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <main>
        <a href="index.php" class="voltar">← Voltar ao Menu Principal</a>

        <h1>Ex 02: Calculadora de IMC (POST)</h1>

        <?php if ($resultado !== null): ?>
            <div style="background: #eef; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
                <p>Olá <strong><?= htmlspecialchars($nome) ?></strong>, seu IMC é <strong><?= $resultado['imc'] ?></strong>.</p>
                <p>Classificação: <span class="<?= $classeCor ?>"><?= $resultado['classificacao'] ?></span></p>
            </div>
        <?php endif; ?>

        <form action="ex02_calculadora_imc.php" method="POST" novalidate>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>">
            <?php if (isset($erro['nome'])): ?><span class="erro"><?= $erro['nome'] ?></span><?php endif; ?>

            <label for="peso">Peso (kg):</label>
            <input type="text" id="peso" name="peso" value="<?= htmlspecialchars($pesoTexto) ?>">
            <?php if (isset($erro['peso'])): ?><span class="erro"><?= $erro['peso'] ?></span><?php endif; ?>

            <label for="altura">Altura (m - Ex: 1.75):</label>
            <input type="text" id="altura" name="altura" value="<?= htmlspecialchars($alturaTexto) ?>">
            <?php if (isset($erro['altura'])): ?><span class="erro"><?= $erro['altura'] ?></span><?php endif; ?>

            <button type="submit">Calcular IMC</button>
        </form>
    </main>
</body>
</html>