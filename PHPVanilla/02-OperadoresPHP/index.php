<?php 
//1. Declare => evitar operações entre variáveis de tipos diferentes
declare(strict_types=1);

// Criar um cálcule de holerite em PHP

//2. Declarar as constantes
const TAXA_INSS = 0.08; //8%
const DESCONTO_VT = 150.00;

//3. Declarar as variaveis
//Dados do empregado
$nomeFuncionario = "Maria Silva";
$salarioBase = 3200.50;
$horasExtras = 10;

//Declaração de variaveis usando lowerCamelCase
// regra => primeira palavra toda minuscula e depois as demais palavras usa-se maisucula na primeira letra
//exemplo: $hojeEstaUmDiaBonito

// 4. Calculos dos salarios
$valorHoraExtra = ($salarioBase / 220) * 1.6;

// -> crie  variavel $totalHorasExtras
$totalHorasExtras = $valorHoraExtra * $horasExtras;


// -> crie a variavel $salarioBruto
$salarioBruto = $salarioBase + $totalHorasExtras;

// -> crie a variavel $descontoInss
$descontoInss = $salarioBruto * TAXA_INSS;

// -> Crie a variavel $salarioLiquido
$salarioLiquido = ($salarioBruto - $descontoInss) - DESCONTO_VT;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holerite - <?php echo $nomeFuncionario?></title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>
    <h2>Demonstrativo de pagamento</h2>
    <!-- SaÍda de dados misturando html e PHP -->
     <table> 
        <tr>
            <th>Colaborador (a): </th>
            <td><?php echo $nomeFuncionario ?></td>
        </tr>
        <tr>
            <th>Salário base: </th>
            <!-- usar uma função chamada number format (formata saida de numeros) -->
            <td> R$ <?php echo number_format($salarioBase,2,",","."); ?></td>
        </tr>
        <tr>
            <th>Total de horas extras trabalhadas: </th>
            <td> R$ <?php echo number_format($totalHorasExtras,2,",","."); ?> </td>
        </tr>
        <tr>
            <th>Salário bruto: </th>
            <td> R$ <?php echo number_format($salarioBruto,2,",","."); ?></td>
        </tr>
         <tr>
            <th>Desconto da taxa do INSS: </th>
            <td> R$ <?php echo number_format($descontoInss,2,",","."); ?></td>
        </tr>
        
        <tr>
            <th>Desconto do vale transpote: </th>
            <td> R$ <?php echo number_format(DESCONTO_VT,2,",","."); ?></td>
        </tr>
        <tr>
            <th>Salário líquido do trabalhador: </th>
            <td> R$ <?php echo number_format($salarioLiquido,2,",","."); ?></td>
        </tr>
        

       
     </table>
</body>
</html>