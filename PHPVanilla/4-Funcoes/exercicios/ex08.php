<!-- Exercício 8: Limpeza e Formatação de CPF
Crie a função limparCPF(string $cpf): string usando str_replace() para remover pontos e traço. Depois, crie cpfValido(string $cpf): bool, que deve verificar se o resultado possui exatamente 11 caracteres numéricos. Use strlen() e is_numeric().
 -->
<?php

function limparCPF(string $cpf): string {
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);
    return $cpf;
}

function cpfValido(string $cpf): bool {
    if (strlen($cpf) === 11 && is_numeric($cpf)) {
        return true;
    } else {
        return false;
    }
}

// Teste
$cpf1 = "123.456.789-09";
$cpf2 = "111.222.333-4";
$cpf3 = "12A.456.789-09";

$cpfsParaTestar = [$cpf1, $cpf2, $cpf3];

foreach ($cpfsParaTestar as $cpfOriginal) {
    $cpfLimpo = limparCPF($cpfOriginal);
    $valido = cpfValido($cpfLimpo);

    echo "CPF original: " . $cpfOriginal . "\n";
    echo "CPF limpo: " . $cpfLimpo . "\n";
    echo "Válido? " . ($valido ? "Sim" : "Não") . "\n";
    echo "------------------------\n";
}

?>