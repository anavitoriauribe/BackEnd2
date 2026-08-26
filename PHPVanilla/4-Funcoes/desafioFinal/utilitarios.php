<?php
// utilitarios.php
declare(strict_types=1);

/**
 * 1. Formata um número para moeda Brasileira
 */
function formatarMoeda(float $valor): string {
    return "R$ " . number_format($valor, 2, ',', '.');
}

/**
 * 2. Remove pontos e traços (Deixa só os números)
 */
function limparDocumento(string $docSujeira): string {
    return str_replace(['.', '-'], '', $docSujeira);
}

/**
 * 3. Aplica desconto na variável original usando Referência (&)
 */
function aplicarDesconto(float &$preco, float $porcentagem): void {
    $desconto = $preco * ($porcentagem / 100);
    $preco -= $desconto;
}

// ==========================================
// SUA MISSÃO COMEÇA AQUI:
// Crie uma função chamada gerarIniciais()
// Ela deve receber uma $string (ex: "Diogo Barbosa")
// E retornar uma $string com a primeira letra de cada palavra (ex: "DB")
// DICA: Pesquise no Google como usar explode(), substr() e strtoupper() no PHP!
// ==========================================

function gerarIniciais(string $nomeCompleto): string {
    $palavras = explode(" ", $nomeCompleto); // quebra o texto em "pedaços", cortando onde tem espaço e vira um array.
    $iniciais = "";

foreach ($palavras as $palavra) { //percorre cada palavra do array e roda: 
    $iniciais .= strtoupper(substr($palavra, 0, 1)); //onde concatena as iniciais com ".=" em maisculo //pega apenas a primeira letra de cada palavra
}
return $iniciais; //retorna as iniciais
}
echo gerarIniciais(""); //escreve as iniciais DB
