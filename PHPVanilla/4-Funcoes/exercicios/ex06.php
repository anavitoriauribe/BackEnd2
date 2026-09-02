<!-- //Exercício 6: Aplicação de Desconto por Referência
 Crie a função aplicarDesconto(float &$preco, float $porcentagem): void. Altere o preço original usando referência. Teste com um produto de R$ 200,00 e desconto de 15%, exibindo o valor antes e depois da chamada. -->
<?php

function aplicarDesconto(float &$preco, float $porcentagem): void {
    $preco = $preco - ($preco * $porcentagem / 100);
}

// Teste
$produto = 200.00;

echo "Preço antes do desconto: R$ " . number_format($produto, 2, ',', '.') . "\n";

aplicarDesconto($produto, 15);

echo "Preço depois do desconto: R$ " . number_format($produto, 2, ',', '.') . "\n";

?>
