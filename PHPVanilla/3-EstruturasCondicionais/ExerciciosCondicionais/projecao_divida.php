<?php 
declare(strict_types=1);

$dividaAtual = 1000.00;//variavel para divida atual
$categoriaCliente = 'B';//variavel para qual categoria o cliente se encaixa

$taxaJuros = match ($categoriaCliente) { // match usado para "traduzir" a cetegoria do cliente à uma porcentagem
    'A' => 0.01,// categoria A => 1%
    'B' => 0.02,// categoria B => 2%
    'C' => 0.03,// categora C => 3%
    default => 0.05// qualquer outra diferente dessas, será cobrado 5%
};
// impressao da tabela
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel financeiro - Projeção de Dívida</title>
      <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2> Evolução de Dívida (12 Meses)</h2>
<p><strong>Categoria do Cliente: </strong>'. $categoriaCliente. '</p> 

<table>
    <thead>
        <tr>
            <th>Mês</th>
            <th>Taxa de Juros</th>
            <th>Juros do Mês</th>
            <th>Saldo Devedor</th>
        </tr>
        </thead>
        <tbody>'; // <tbody> e <thead> são paa o corpo e titulo da tabela (table body, table head), diferente de <body> e < head> que são para a pagina inteira

for ($mes = 1; $mes <= 12; $mes ++ ){ // o mês q se incia é o 1; ele conta até o 12, e o 12; ele adiciona de 1 em 1
   if ($mes == 6) { // aqui é uma exceção do for, onde, se for o mês 6, ele não faz o calculo igual aos outros

   //impressão da linha para o mês 6
    echo "<tr style='background-color: #b7d8f3c2; font-weight: bold;'>";
            echo "<td>Mês 6</td>";
            echo "<td colspan='2' style='text-align: center;'>Isenção de Juros</td>";
            echo "<td>R$ " . number_format($dividaAtual, 2, ',', '.') . "</td>";
        echo "</tr>";
    continue; // pula o mês 6 e vai direto para o próximo mês
   } 

//calculo dos outros meses 
$jurosDoMes = $dividaAtual * $taxaJuros;
$dividaAtual = $dividaAtual + $jurosDoMes; 
// impressão para os meses normais
echo "<tr>";
echo "<td>Mês $mes</td>";
echo "<td>" . ($taxaJuros * 100) . "%</td>";
echo "<td>R$ " . number_format($jurosDoMes, 2, ',', '.') . "</td>";
        echo "<td>R$ " . number_format($dividaAtual, 2, ',', '.') . "</td>";
    echo "</tr>";
}
echo "  </tbody>
</table
</body>
</html>";

?>
