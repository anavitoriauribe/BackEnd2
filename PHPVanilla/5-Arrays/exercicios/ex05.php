<!-- Exercício 5: Black Friday no E-commerce (Mapeamento)
A loja inteira entrou em Black Friday, e todos os preços devem cair 20%. Mock de Dados:
$carrinho = [
    ["produto" => "Notebook", "preco" => 4000.00],
    ["produto" => "Mouse", "preco" => 150.00],
    ["produto" => "Teclado", "preco" => 300.00]
];
Missão: Use a função array_map para criar um novo array chamado $carrinhoBlackFriday. A função interna do map deve aplicar um desconto de 20% (ou seja, multiplicar por 0.80) no valor de $item['preco'] e retornar o item atualizado. Depois, exiba a lista de preços novos na tela. -->

<?php

$carrinho = [
    ["produto" => "Notebook", "preco" => 4000.00],
    ["produto" => "Mouse", "preco" => 150.00],
    ["produto" => "Teclado", "preco" => 300.00]
];

$carrinhoBlackFriday = array_map(function($item) {
    $item['preco'] = $item['preco'] * 0.80;
    return $item;
}, $carrinho);

$totalCarrinho = 0;
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
            <th>Produto</th>
            <th>Preço com desconto</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        //percorre todos os produtos do carrinho com desconto
        foreach ($carrinhoBlackFriday as $item): ?>
            <?php 
            //soma o total do carrinho
            $totalCarrinho = $totalCarrinho + $item["preco"]; ?>
            <tr>
                <td><?php echo $item["produto"]; ?></td>
                <td>R$ <?php //mostra o preco em reais 
                echo number_format($item["preco"], 2, ',', '.'); ?></td>
            </tr> 
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td>Total do Carrinho</td>
            <td>R$ <?php //mostra o total do carrinho
            echo number_format($totalCarrinho, 2, ',', '.'); ?></td>
        </tr>
    </tfoot>
</table>