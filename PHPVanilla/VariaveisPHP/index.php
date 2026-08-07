<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo de variáveis</title>
</head>
<body>
     <h1>Estudo de Variáveis</h1>
    <hr>
    <?php 
    // para criar variáveis em php bata usar o sinal de $
    // variáveis em php são NÃO tipadas, NÃO precisa declarar o tipo (Texto, numeros, booleanas)
    // ao atribuir valor para a variável a tipagem é automática
    $nome = "João"; // criação da variavel nome com o valor textual "João"
    $idade = 25; // criação da variável idade com o valor numérico 25
    $ativo = true; // criação da variável ativo com o valor booleano true
    $salario = 1520.68; // variavel numerica - decimal (float - double)
    $status = null; // variavel null
    //$endereço; // Variáveil undefined, não é possivel declarar uma variavel sem atribuir um valor a ela, não existe undefined em PHP

    // Dicas para Criação de Variáveis
    // Não incie o nome de uma variavel com numeros
    // Não utilize espaços em banco
    // Não utilize caracteres especiais, somente o underline
    // Crie variáveis con nomes que ajudrão a identificar melhor a mesma
    // Evite utilizar letras maiúsculas.
    

    //exibie as varalveis na tela
    echo "Nome: $nome <br>";
    echo "Idade: $idade <br>";
    echo "Ativo: $ativo <br>";
    echo "Salario: $salario <br>";
    echo "Status $status <br>"; 

    echo "<br><h3>Constantes </h3><br>";
    // Constantes são representadas pela palavra "const" ou "define" seguidos do nome da constante
    // exemplos de constantes 
    const PI = 3.12; // constante do ipo number (float)
    const EMPRESA= "Google";//contante do tipo string
    define("SITE", "www.google.com"); // declaração de constante do tipo string usando "define"
    // uma boa prática é utilizar letras maiúsculas para nomear constantes, para diferenciar das variáveis
    
    //Exibir as constantes na tela
    echo"Valor de PI: " . PI . "<br>";
    echo "Nome da empresa: " . EMPRESA . "<br>";
    echo "Site: " . SITE . "<br>";

    //tentar alterar o valor de uma constante, isso irá gerar um erro de código, pois constantes não podem ser alteradas
    // PI = 3.14159; -> isso é um ero
    // declarar uma constante também irá gerar um erro
    // const SITE = "www.google.com.br"; // isso é um erro 
    
    //Regra de ouro: Sempre coloque a instrução "declare(strict_types=1);" no inicio do se código PHP, isso blindará so seu sistema contra mistura acidentais de tipos de dados.

    // utilização de texto (Concatenação Vs Interpolação)

    //Exemplo de Concatenação => Juntar duas ou mais strings utilizando o operador "."
    echo "olá, " .$nome."! Seja bem vindo ao nosso site! <br>";

    // Exemplo de interpolação => Utilização de variáveis dentro de um texto, utilizando aspas duplas no texto
    echo "$nome tem $idade anos e seu salário é R$ $salario reais. <br>"; 
    //Interpolar é um método clean code, é a preferivel 








    ?>
</body>
</html>