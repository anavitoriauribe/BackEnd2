// Exercício 4: Formatador de Nome
Crie a função formatarNome(string $nome): string. Remova espaços extras com trim(), converta o texto para letras minúsculas com strtolower() e transforme a primeira letra em maiúscula com ucfirst(). Teste com nomes digitados em formatos diferentes.
<?php

declare(strict_types=1);

function formatarNome(string $nome): string
{
    $nome = trim($nome);
    $nome = strtolower($nome);
    $nome = ucfirst($nome);

    return $nome;
}

echo formatarNome("   JOANA  ") . "<br>";
echo formatarNome("cAMILE ") . "<br>";
