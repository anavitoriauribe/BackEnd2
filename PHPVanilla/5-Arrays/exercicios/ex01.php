<!-- NÍVEL 1: ARRAYS INDEXADOS E LAÇOS BÁSICOS
Exercício 1: O Boletim Escolar (Cálculo de Média)
Você precisa criar um script que calcule a média de um aluno com base em um array numérico simples. Mock de Dados:
$notas = [7.5, 8.0, 6.5, 9.0, 5.5];
Missão: Use um laço foreach para somar todas as notas. Depois, divida pelo número total de notas (Dica: pesquise a função count()).
Saída Esperada: Exiba na tela: "A média final do aluno é X".
Desafio Extra: Se a média for maior ou igual a 7, exiba "Aprovado" em verde; senão, "Reprovado" em vermelho. -->
<?php 

$notas = [7.5, 8.0, 6.5, 9.0, 5.5];
$soma = 0;
foreach($notas as $nota){
    $soma = $nota + $soma;
}
$media = $soma / count($notas);
echo "A média final do aluno é $media";

if ($media >= 7) {
    echo "<span style='color: green'><br>Aprovado</span>";
}
else {
    echo "<span style='color: red'><br>Reprovado</span>";
}
?>