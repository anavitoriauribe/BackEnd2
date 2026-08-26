<?php 
declare(strict_types=1);

$produtos = [
    1 => ["nome" => "Coxinha", "Preço"=> 6.00,"Estoque" => 10],
    2 => ["nome" => "Suco", "Preço"=> 5.00,"Estoque" => 8],
    3 => ["nome" => "Sanduíche", "Preço"=> 12.00,"Estoque" => 6],
    4 => ["nome" => "Bolo", "Preço"=> 7.50,"Estoque" => 6]
];
$pedido = [];
$opcao = 0;

do {
    "1 — Listar produtos
2 — Adicionar produto ao pedido
3 — Exibir resumo do pedido
4 — Finalizar compra
0 — Sair sem finalizar";

$acao= match ($opcao) { // match usado para "traduzir" a ação e retornar um texto de acordo com a ação
    '1' => 'listar',
    '2' => 'adicionar',
    '3' => 'resumo',
    '4' => 'finalizar',
    '0' => 'sair',
    default => 'inválido'
};
if ($acao === 'listar') {
    echo "---- PRODUTOS DISPONÍVEIS----\n";

    foreach ($produtos as $produtos) {
    echo "$produtos <br>";
}}
elseif ($acao === 'adicionar') {
    echo "---- ADICIONAR PRODUTO----\n";
}


} while ( $opcao !== 0 && $opcao !== 4);
?>