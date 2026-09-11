<!-- NÍVEL 5: O "DESAFIO DO CHEFÃO" (Integração Lógica Avançada)
Exercício 6: Dashboard Financeiro (Extrato Bancário)
Você está programando a tela inicial de um banco digital (estilo Nubank). Você recebe do banco de dados um extrato com todas as transações do mês de um cliente.
Mock de Dados:
$extrato = [
    ["data" => "2026-09-01", "descricao" => "Salário", "tipo" => "Entrada", "valor" => 4000.00],
    ["data" => "2026-09-02", "descricao" => "Supermercado", "tipo" => "Saida", "valor" => 450.50],
    ["data" => "2026-09-05", "descricao" => "Pix João", "tipo" => "Entrada", "valor" => 200.00],
    ["data" => "2026-09-10", "descricao" => "Conta de Luz", "tipo" => "Saida", "valor" => 120.00],
    ["data" => "2026-09-12", "descricao" => "Cinema", "tipo" => "Saida", "valor" => 65.00]
];
Sua Missão Completa:
Cálculo de Totais: Percorra o extrato e calcule 3 variáveis:
$totalEntradas: Soma de tudo que tiver o tipo "Entrada".
$totalSaidas: Soma de tudo que tiver o tipo "Saida".
$saldoAtual: $totalEntradas menos $totalSaidas.
Renderização (Cards e Tabela):
Exiba 3 "Cartões" no topo da tela com os valores de Entradas, Saídas e Saldo Atual formatados em Reais (R$).
Crie uma regra visual: Se o $saldoAtual for negativo, a cor do texto deve ficar vermelha. Se for positivo, verde.
Abaixo dos cartões, exiba a Tabela HTML completa com a listagem de todas as transações.
Filtro de Gastos Altos (Opcional - Nível Sênior):
Use array_filter para descobrir todas as transações de "Saida" que foram maiores que R$ 100,00. Exiba uma mini-tabela no final da página chamada "Atenção: Gastos Altos do Mês".

Dicas de Qualidade (QA - Quality Assurance):
Se o seu código deu o erro Notice: Undefined index ou Warning: Undefined array key, significa que você digitou o nome da chave errado (ex: digitou Idade com I maiúsculo, mas no array estava idade com i minúsculo).
Sempre teste seus arrays com <pre> var_dump($array); </pre> antes de tentar fazer a tela HTML funcionar. Entenda como o dado está guardado na memória primeiro! -->
<?php

$extrato = [
    ["data" => "2026-09-01", "descricao" => "Salário", "tipo" => "Entrada", "valor" => 4000.00],
    ["data" => "2026-09-02", "descricao" => "Supermercado", "tipo" => "Saida", "valor" => 450.50],
    ["data" => "2026-09-05", "descricao" => "Pix João", "tipo" => "Entrada", "valor" => 200.00],
    ["data" => "2026-09-10", "descricao" => "Conta de Luz", "tipo" => "Saida", "valor" => 120.00],
    ["data" => "2026-09-12", "descricao" => "Cinema", "tipo" => "Saida", "valor" => 65.00]
];

// 1. Cálculo de Totais
$totalEntradas = 0;
$totalSaidas = 0;

foreach ($extrato as $transacao) {
    if ($transacao["tipo"] === "Entrada") {
        $totalEntradas = $totalEntradas + $transacao["valor"];
    } else {
        $totalSaidas = $totalSaidas + $transacao["valor"];
    }
}

$saldoAtual = $totalEntradas - $totalSaidas;

// 3. Filtro de Gastos Altos (Saida > R$ 100,00)
$gastosAltos = array_filter($extrato, function($transacao) {
    return $transacao["tipo"] === "Saida" && $transacao["valor"] > 100.00;
});

?>

<style>
    body {
        background: #f2f4f7;
        padding: 20px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 600px;
        font-family: Arial, sans-serif;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 8px 12px;
        text-align: left;
    }

    th {
        background: #88cdd6;
        color: #fff;
    }

    tfoot td {
        font-weight: bold;
        background: aliceblue;
    }

    .saldo-positivo {
        color: green;
    }

    .saldo-negativo {
        color: red;
    }

    .resumo {
        background: #fff;
        border-left: 4px solid #88cdd6;
        border-radius: 6px;
        max-width: 600px;
        padding: 12px 16px;
        margin-bottom: 20px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .resumo p {
        margin: 4px 0;
        color: #333;
    }
</style>

<!-- Cards de Resumo -->
<div class="resumo">
    <p><strong>Entradas:</strong> R$ <?php echo number_format($totalEntradas, 2, ',', '.'); ?></p>
    <p><strong>Saídas:</strong> R$ <?php echo number_format($totalSaidas, 2, ',', '.'); ?></p>
    <p>
        <strong>Saldo Atual:</strong>
        <span class="<?php echo $saldoAtual < 0 ? 'saldo-negativo' : 'saldo-positivo'; ?>">
            R$ <?php echo number_format($saldoAtual, 2, ',', '.'); ?>
        </span>
    </p>
</div>

<!-- Tabela do Extrato -->
<h2>Extrato do Mês</h2>
<table>
    <thead>
        <tr>
            <th>Data</th>
            <th>Descrição</th>
            <th>Tipo</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($extrato as $transacao): ?>
            <tr>
                <td><?php echo $transacao["data"]; ?></td>
                <td><?php echo $transacao["descricao"]; ?></td>
                <td><?php echo $transacao["tipo"]; ?></td>
                <td>R$ <?php echo number_format($transacao["valor"], 2, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Mini Tabela: Gastos Altos -->
<h2>⚠️ Atenção: Gastos Altos do Mês</h2>
<table>
    <thead>
        <tr>
            <th>Data</th>
            <th>Descrição</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($gastosAltos as $gasto): ?>
            <tr>
                <td><?php echo $gasto["data"]; ?></td>
                <td><?php echo $gasto["descricao"]; ?></td>
                <td>R$ <?php echo number_format($gasto["valor"], 2, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>