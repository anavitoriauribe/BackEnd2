<!-- Exercício 2: Perfil do Usuário
Você está criando a página de perfil de um aplicativo. Mock de Dados:
$usuario = [
    "nome" => "Carlos Eduardo",
    "idade" => 28,
    "cidade" => "Americana",
    "estado" => "SP",
    "premium" => true
];
Missão: Renderize um mini "Card" em HTML exibindo os dados do usuário.
Regra de Negócio: Se o usuário for premium (true), exiba uma estrela ⭐ ao lado do nome dele. Junte a cidade e o estado para exibir no formato "Americana - SP". -->
<?php 

$usuario = [
    "nome" => "Carlos Eduardo",
    "idade" => 28,
    "cidade" => "Americana",
    "estado" => "SP",
    "premium" => true
];
?> 

<style>
    .card {
        width: 220px;
        background: #88cdd6;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        font-family: Arial, sans-serif;
        text-align: center;
    }

    .card h3 {
        margin: 0 0 8px 0;
        color: #2575fc;
    }

    .card p {
        margin: 4px 0;
        font-size: 14px;
        color: #333;
    }
</style>

<?php
echo "<div class='card'>";

echo "<h2> Perfil de  {$usuario ['nome']} </h2>";

echo "<h4>" . $usuario["nome"] ;
if ($usuario ["premium"] == true) {
    echo  "⭐";
}
 echo "</h4>";

 echo "<p>Idade: " . $usuario["idade"] . "</p>";
 echo "<p>" . $usuario["cidade"] . " -" . $usuario["estado"] . "</p>";
echo "</div>";

?>