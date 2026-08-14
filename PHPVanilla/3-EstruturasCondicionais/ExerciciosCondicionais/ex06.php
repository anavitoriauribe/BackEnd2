<?php 
declare(strict_types=1);
$diaSemana = "Quarta";
$ingressosBase = 40.00;
$isEstudante = true;

$descontoDia = match ($diaSemana) {
    "Segunda", "Terça" =>  $ingressosBase * 0.8,
    "Quarta" =>  $ingressosBase * 0.5,
    "Quinta", "Sexta", "Sábado", "Domingo" =>  $ingressosBase
};

if ($isEstudante === true){
    $valorFinal = $descontoDia * 0.5;

}
else {
    $valorFinal = $descontoDia;
}
echo "O valor do ingresso é R$" . number_format ($valorFinal,2,".",",");
?>