<!-- Exercício 9: Cadastro de Clientes
Crie a função buscarCliente(array $clientes, string $nome): ?array. Use foreach para procurar um cliente pelo nome e retorne seu array quando encontrá-lo. Se não encontrar, retorne null. Teste os dois cenários.
 -->
<?php

function buscarCliente(array $clientes, string $nome): ?array {
    foreach ($clientes as $cliente) {
        if ($cliente['nome'] === $nome) {
            return $cliente;
        }
    }
    return null;
}

// Teste
$clientes = [
    ["nome" => "Ana Silva", "idade" => 28, "cidade" => "São Paulo"],
    ["nome" => "Bruno Costa", "idade" => 35, "cidade" => "Rio de Janeiro"],
    ["nome" => "Carla Souza", "idade" => 42, "cidade" => "Belo Horizonte"],
];

// Cenário 1: cliente existe
$resultado1 = buscarCliente($clientes, "Bruno Costa");

if ($resultado1 !== null) {
    echo "Cliente encontrado:\n";
    echo "Nome: " . $resultado1['nome'] . "\n";
    echo "Idade: " . $resultado1['idade'] . "\n";
    echo "Cidade: " . $resultado1['cidade'] . "\n";
} else {
    echo "Cliente não encontrado.\n";
}

echo "------------------------\n";

// Cenário 2: cliente não existe
$resultado2 = buscarCliente($clientes, "Daniela Lima");

if ($resultado2 !== null) {
    echo "Cliente encontrado:\n";
    echo "Nome: " . $resultado2['nome'] . "\n";
} else {
    echo "Cliente não encontrado.\n";
}

?>