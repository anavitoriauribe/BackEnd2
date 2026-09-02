<!-- Exercício 10: Controle de Estoque
Crie a função 
retirarEstoque(array &$produto, int $quantidade): bool. 
Use referência para atualizar o estoque original. Retorne true quando houver estoque suficiente e false quando a quantidade solicitada for inválida ou maior que o estoque. Teste uma retirada permitida e uma retirada recusada.
 -->
<?php

function retirarEstoque(array &$produto, int $quantidade): bool {
    if ($quantidade <= 0) {
        return false;
    }

    if ($quantidade > $produto['estoque']) {
        return false;
    }

    $produto['estoque'] -= $quantidade;
    return true;
}

// Teste
$produto = [
    "nome" => "Mouse Gamer",
    "estoque" => 20
];

echo "Estoque inicial de '{$produto['nome']}': {$produto['estoque']} unidades\n";
echo "------------------------\n";

// Cenário 1: retirada permitida
$sucesso1 = retirarEstoque($produto, 5);

echo "Tentativa de retirar 5 unidades...\n";
echo "Resultado: " . ($sucesso1 ? "Sucesso" : "Falha") . "\n";
echo "Estoque atual: {$produto['estoque']} unidades\n";

echo "------------------------\n";

// Cenário 2: retirada recusada (quantidade maior que o estoque)
$sucesso2 = retirarEstoque($produto, 100);

echo "Tentativa de retirar 100 unidades...\n";
echo "Resultado: " . ($sucesso2 ? "Sucesso" : "Falha") . "\n";
echo "Estoque atual: {$produto['estoque']} unidades\n";

?>