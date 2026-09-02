<!-- //Exercício 7: Relatório de Notas
Crie as funções calcularMedia(array $notas): float e verificarAprovacao(float $media): string. Use count() para calcular a média e if / else para retornar Aprovado quando a média for maior ou igual a 7, ou Reprovado caso contrário. Mostre também a maior e a menor nota usando max() e min(). -->

<?php

function calcularMedia(array $notas): float {
    return array_sum($notas) / count($notas);
}

function verificarAprovacao(float $media): string {
    if ($media >= 7) {
        return "Aprovado";
    } else {
        return "Reprovado";
    }
}

// Teste
$notas = [8.5, 6.0, 7.5, 9.0, 5.5];

$media = calcularMedia($notas);
$situacao = verificarAprovacao($media);
$maiorNota = max($notas);
$menorNota = min($notas);

echo "Notas: " . implode(", ", $notas) . "\n";
echo "Média: " . number_format($media, 2, ',', '.') . "\n";
echo "Situação: " . $situacao . "\n";
echo "Maior nota: " . number_format($maiorNota, 2, ',', '.') . "\n";
echo "Menor nota: " . number_format($menorNota, 2, ',', '.') . "\n";

?>