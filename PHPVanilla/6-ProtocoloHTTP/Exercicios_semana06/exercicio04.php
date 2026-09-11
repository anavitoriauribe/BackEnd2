<?php
declare(strict_types=1);

$erro = [];
$resultado = null;

// Lista com os valores permitidos para o select
$opcoesParcelas = [12, 24, 36, 48, 60];

$valorVeiculoTexto = trim((string)($_POST['valor_veiculo'] ?? ''));
$valorEntradaTexto = trim((string)($_POST['valor_entrada'] ?? ''));
$numeroParcelasTexto = trim((string)($_POST['numero_parcelas'] ?? ''));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valorVeiculo = filter_var($valorVeiculoTexto, FILTER_VALIDATE_FLOAT);
    $valorEntrada = filter_var($valorEntradaTexto, FILTER_VALIDATE_FLOAT);
    $numeroParcelas = filter_var($numeroParcelasTexto, FILTER_VALIDATE_INT);

    if ($valorVeiculo === false || $valorVeiculo <= 0) {
        $erro['valor_veiculo'] = "Informe um valor de veículo válido.";
    }

    // Validação da entrada mínima correspondente a 20%
    if ($valorEntrada === false || $valorVeiculo === false || $valorEntrada < ($valorVeiculo * 0.20)) {
        $erro['valor_entrada'] = "A entrada deve ser de no mínimo 20% do valor do veículo.";
    }

    // Validação com in_array para aceitar apenas valores autorizados da lista
    if ($numeroParcelas === false || !in_array($numeroParcelas, $opcoesParcelas, true)) {
        $erro['numero_parcelas'] = "Selecione uma opção de parcelas válida.";
    }

    // Cálculo das parcelas com taxa de juros simples de 1.5% ao mês
    if (empty($erro)) {
        $saldoFinanciado = $valorVeiculo - $valorEntrada;
        $totalJuros = $saldoFinanciado * 0.015 * $numeroParcelas;
        $valorTotal = $saldoFinanciado + $totalJuros;
        $valorParcela = $valorTotal / $numeroParcelas;

        $resultado = [
            'financiado' => number_format($saldoFinanciado, 2, ',', '.'),
            'juros' => number_format($totalJuros, 2, ',', '.'),
            'parcela' => number_format($valorParcela, 2, ',', '.'),
            'qtd_parcelas' => $numeroParcelas
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ex 04 - Financiamento de Veículos</title>
     <link rel="icon" type="image/png" href="favicon.ico">
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f8; padding: 20px; }
        main { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        h1 { color: #a02581; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background: #a02581; color: white; border: none; padding: 10px 15px; margin-top: 15px; border-radius: 4px; cursor: pointer; }
        .erro { color: #b00020; font-size: 0.85em; }
        .voltar { display: inline-block; margin-bottom: 15px; color: #a02581; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <main>
        <a href="index.php" class="voltar">← Voltar ao Menu Principal</a>

        <h1>Ex 04: Simulador de Financiamento (POST)</h1>

        <form action="ex04_financiamento.php" method="POST" novalidate>
            <label for="valor_veiculo">Valor do Veículo (R$):</label>
            <input type="text" id="valor_veiculo" name="valor_veiculo" value="<?= htmlspecialchars($valorVeiculoTexto) ?>">
            <?php if (isset($erro['valor_veiculo'])): ?><span class="erro"><?= $erro['valor_veiculo'] ?></span><?php endif; ?>

            <label for="valor_entrada">Valor da Entrada (R$):</label>
            <input type="text" id="valor_entrada" name="valor_entrada" value="<?= htmlspecialchars($valorEntradaTexto) ?>">
            <?php if (isset($erro['valor_entrada'])): ?><span class="erro"><?= $erro['valor_entrada'] ?></span><?php endif; ?>

            <label for="numero_parcelas">Número de Parcelas:</label>
            <select id="numero_parcelas" name="numero_parcelas">
                <option value="">Selecione...</option>
                <?php foreach ($opcoesParcelas as $opcao): ?>
                    <option value="<?= $opcao ?>" <?= $numeroParcelasTexto == $opcao ? 'selected' : '' ?>>
                        <?= $opcao ?>x
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($erro['numero_parcelas'])): ?><span class="erro"><?= $erro['numero_parcelas'] ?></span><?php endif; ?>

            <button type="submit">Calcular Financiamento</button>
        </form>

        <?php if ($resultado !== null): ?>
            <h2>Resultado do Cálculo</h2>
            <p><strong>Valor Financiado:</strong> R$ <?= $resultado['financiado'] ?></p>
            <p><strong>Total de Juros (1.5% a.m.):</strong> R$ <?= $resultado['juros'] ?></p>
            <p><strong>Valor por Parcela (<?= $resultado['qtd_parcelas'] ?>x):</strong> R$ <?= $resultado['parcela'] ?></p>
        <?php endif; ?>
    </main>
</body>
</html>