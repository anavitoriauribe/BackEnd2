<!-- NÍVEL 3: ARRAYS MULTIDIMENSIONAIS (TABELAS DE DADOS)
Exercício 3: Folha de Pagamento do RH
O departamento de RH precisa ver a lista de funcionários e saber quanto dinheiro a empresa gasta com salários por mês. Mock de Dados:
$funcionarios = [
    ["id" => 1, "nome" => "Ana Souza", "cargo" => "Dev Front-End", "salario" => 4500.00],
    ["id" => 2, "nome" => "Bruno Costa", "cargo" => "Dev Back-End", "salario" => 5200.00],
    ["id" => 3, "nome" => "Carla Dias", "cargo" => "Tech Lead", "salario" => 8900.00],
    ["id" => 4, "nome" => "Daniel Silva", "cargo" => "Estagiário", "salario" => 1500.00],
];
Missão 1: Crie uma Tabela HTML e use um foreach para preencher as linhas (<tr>) com os dados de cada funcionário. Formate o salário para o padrão Real (R$).
Missão 2: Crie uma variável $totalFolha = 0; antes do laço. Durante o foreach, vá somando os salários nela. No final da tabela, exiba o total gasto pela empresa. -->
<?php

$funcionarios = [
    ["id" => 1, "nome" => "Ana Souza", "cargo" => "Dev Front-End", "salario" => 4500.00],
    ["id" => 2, "nome" => "Bruno Costa", "cargo" => "Dev Back-End", "salario" => 5200.00],
    ["id" => 3, "nome" => "Carla Dias", "cargo" => "Tech Lead", "salario" => 8900.00],
    ["id" => 4, "nome" => "Daniel Silva", "cargo" => "Estagiário", "salario" => 1500.00],
];

$totalFolha = 0;
?>

<style>
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
</style>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Salário</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        //percorre todos os funcionários
        foreach ($funcionarios as $funcionario): ?>
            <?php 
            //soma do salario  total
           $totalFolha = $totalFolha + $funcionario["salario"]; ?>
            <tr>
                <td><?php echo $funcionario["id"]; ?></td>
                <td><?php echo $funcionario["nome"]; ?></td>
                <td><?php echo $funcionario["cargo"]; ?></td>
                <td>R$ <?php //mostra o slario em reais 
                echo number_format($funcionario["salario"], 2, ',', '.'); ?></td>
            </tr> 
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total da Folha de Pagamento</td>
            <td>R$ <?php //mostra o total da folha de pagamento
            echo number_format($totalFolha, 2, ',', '.'); ?></td>
        </tr>
    </tfoot>
</table>